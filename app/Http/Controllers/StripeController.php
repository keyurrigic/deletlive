<?php
namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Traits\Response\ResponseTrait;
use App\Mail\OrderMail;
use Mail; 
use Stripe;
use Session;
use Auth;

class StripeController extends Controller
{
    use ResponseTrait;
    public function stripePost(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $cartItems = \Cart::getContent();
        if($cartItems->count()==0)
        {
            return $this->jsonResponseFail(
                'Empty Cart',
                 422
             );
        }


        $user_id=Auth::user()->id;
        $CustomerUser=Customer::find($user_id);
        //create an order first 
        $order = new Order();
        $order->customer_id=$CustomerUser->id;
        $order->total=0;
        $order->status="Order Placed";
        $order->save();
        $order_id=$order->id;

        //now generate order items 
        $total=0;
        $deposite_charge=0;
        $subscription_items=[];
        $subscription_amount=0;
        foreach($cartItems as $item){
            //$deposite_charge=($item->attributes->deposite)*($item->quantity);
            $OrderItem = new OrderItem();
            $OrderItem->order_id=$order_id;
            $OrderItem->title=$item->name;
            $OrderItem->price=$item->getPriceWithConditions();
            $OrderItem->qty=$item->quantity;
            $OrderItem->total=($item->getPriceWithConditions() * $item->quantity);
            $OrderItem->save();
            $total+=$OrderItem->total;
            //subscription data
            $subscription_items[]=[
                'price_data'=>[
                    'currency'=>'USD',
                    'product'=>'prod_M3RZODNSzqmEQe',   //production
                    //'product'=>'prod_LvbrRr31E07Zmr',   //dev
                    'recurring'=>[
                        'interval'=>'month'
                    ],
                    'unit_amount'=>($item->getPriceWithConditions()*100)
                   // 'unit_amount'=>(2*100)  //test purpose
                ],
                'quantity'=>$item->quantity
            ];
            
        }
        $order->total=$total;
        $subscription_amount=$total;
        $order->save();

        //now create customer in stripe
        try{
            $customer = $stripe->customers->create([
                "name"=>$CustomerUser->name,
                "email"=>$CustomerUser->email,
                "source"=>$request->stripeToken
            ]);
        }
        catch(Stripe\Exception\InvalidRequestException $e){
            return $this->jsonResponseFail(
                $e->getError().'Issue With Creating Customer',
                 422
             );
        }
        $stripe_customer_id=$customer->id;

        //now create a subscription for the customer 
        if(!empty($subscription_items)){
            try{
                $subscription=$stripe->subscriptions->create([
                    'customer' => $stripe_customer_id,
                    'items' => $subscription_items,
                    'description'=> "Subscription for Order #".$order_id
                ]);

                //add subscription to the user and 
                $sub = new Subscription();
                $sub->customer_id=$CustomerUser->id;
                $sub->order_id=$order_id;
                $sub->subscriptionid=$subscription->id;
                $sub->current_period_start=$subscription->current_period_start;
                $sub->current_period_end=$subscription->current_period_end;
                $sub->latest_invoice=$subscription->latest_invoice;
                $sub->subscription_amount=$subscription_amount;
                $sub->jsonresponse=json_encode($subscription);
                $sub->save();
                //Mail::to('infodelete@yopmail.com')->send(new OrderMail($sub));
                Mail::to($CustomerUser->email)->send(new OrderMail($order));
            }
            catch(Stripe\Exception\InvalidRequestException $e){
                return $this->jsonResponseFail(
                    'Issue With Subscription',
                     422
                 );
            }
        } 

        // clear cart // 
        //\Cart::clear();
        return $this->jsonResponseSuccess();
    }
    function stripeInvoice($id){
        //get the invoice from invoide id 
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $invoice=$stripe->invoices->retrieve(
            $id , []);
        if(!empty($invoice->hosted_invoice_url))
            {
                return redirect()->intended($invoice->hosted_invoice_url);
            }
        die('Something went wrong');
    }
    function SendOrderEmail(){
        $orderid=46;
        $order=Order::find($orderid);
        Mail::to('keyur@yopmail.com')->send(new OrderMail($order));
        die;
    }
}
