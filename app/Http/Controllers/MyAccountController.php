<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Country;
use App\Models\ShippingAddress;
use App\Models\BillingAddress;
use App\Models\Ticket;
use App\Models\TicketReply;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ChangeNameRequest;
use App\Http\Requests\CreateTicketRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Traits\Response\ResponseTrait;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    use ResponseTrait;
    public function index(){
        $user_id=Auth::user()->id;
        $customer=Customer::find($user_id);
        return view('myaccounts.index',['customer'=>$customer,'menu'=>'my-account']);
    }
    public function address(){
        $user_id=Auth::user()->id;
        $customer=Customer::find($user_id);
        $countries=Country::orderBy('name','asc')->get();
        return view('myaccounts.address',['customer'=>$customer,'countries'=>$countries,'menu'=>'address']);
    } 
    public function orders(){
        $user_id=Auth::user()->id;
        $customer=Customer::find($user_id);
        return view('myaccounts.orders',['customer'=>$customer,'menu'=>'orders']);
    }
    public function changename(ChangeNameRequest $request){
        $user_id=Auth::user()->id;
        $customer=Customer::find($user_id);
        $customer->name=$request->name;
        $customer->save();
        return $this->jsonResponseSuccess();
    }
    public function createticket(CreateTicketRequest $request){
        $ticket = new Ticket;
        $user_id=Auth::user()->id;
        $ticket->customer_id=$user_id;
        $ticket->subject=$request->subject;
        $ticket->description=$request->description;
        $ticket->status="Open";
        $ticket->save();
        return $this->jsonResponseSuccess();
    }
    public function changepassword(ChangePasswordRequest $request){
        //check old password
        $user_id=Auth::user()->id;
        $customer=Customer::find($user_id);
        if(!Hash::check($request->oldpassword,$customer->password)){
            return $this->jsonResponseFail(
                'Invalid Old password',
                422
            );
        }
        $customer->password=Hash::make($request->newpassword);
        $customer->save();
        return $this->jsonResponseSuccess();
    }
    public function changeshippingaddress(Request $request){
        $user_id=Auth::user()->id;
        $customer=Customer::find(1);
        
        if(empty($customer->shipping())){
            //add mew shipping
            $shipping = new ShippingAddress;
            $shipping->fullname=$request->fullname;
            $shipping->phonenumber=$request->phonenumber;
            $shipping->address1=$request->address1;
            $shipping->address2=$request->address2;
            $shipping->country_id =$request->country;
            $shipping->state=$request->state;
            $shipping->city=$request->city;
            $shipping->postalcode=$request->postalcode;
            $customer->shipping()->save($shipping);   
        }else{
            $customer->shipping->fullname=$request->fullname;
            $customer->shipping->phonenumber=$request->phonenumber;
            $customer->shipping->address1=$request->address1;
            $customer->shipping->address2=$request->address2;
            $customer->shipping->country_id =$request->country;
            $customer->shipping->state=$request->state;
            $customer->shipping->city=$request->city;
            $customer->shipping->postalcode=$request->postalcode;
            $customer->shipping()->save($customer->shipping);
        }
    }
    public function changebillingaddress(Request $request){
        $user_id=Auth::user()->id;
        $customer=Customer::find(1);
        
        if(empty($customer->billing())){
            //add mew shipping
            $billing = new BillingAddress;
            $shipping->fullname=$request->fullname;
            $billing->phonenumber=$request->phonenumber;
            $billing->address1=$request->address1;
            $billing->address2=$request->address2;
            $billing->country_id =$request->country;
            $billing->state=$request->state;
            $billing->city=$request->city;
            $billing->postalcode=$request->postalcode;
            $customer->billing()->save($billing);   
        }else{
            $customer->billing->fullname=$request->fullname;
            $customer->billing->phonenumber=$request->phonenumber;
            $customer->billing->address1=$request->address1;
            $customer->billing->address2=$request->address2;
            $customer->billing->country_id =$request->country;
            $customer->billing->state=$request->state;
            $customer->billing->city=$request->city;
            $customer->billing->postalcode=$request->postalcode;
            $customer->billing()->save($customer->billing);
        }
    }
    public function support(){
        $user_id=Auth::user()->id;
        $tickets['open'] = Ticket::select('*')->where('customer_id', '=', $user_id)->where('status', '=',"Open")->orderBy('id', 'DESC')->get();
        $tickets['close'] = Ticket::select('*')->where('customer_id', '=', $user_id)->where('status', '=',"Close")->orderBy('id', 'DESC')->get();
        return view('myaccounts.support',['tickets'=>$tickets,'menu'=>'support']);
    }
    public function reply($id){
        $name=Auth::user()->name;
        $ticket=Ticket::where('id',$id)->first();
        $ticketReplies=TicketReply::where('ticket_id',$id)->get();
        return view('myaccounts.reply',['name'=>$name,'ticket'=>$ticket,'ticketReplies'=>$ticketReplies,'menu'=>'support']);
    }
    public function replyticket(Request $request){
        $reply = new TicketReply;
        $img=[];
        if ($request->hasfile('images')) {
            $images = $request->file('images');
            foreach($images as $image) {
            
                $fileName = time().'_'.$image->getClientOriginalName(); 
                $image->move(public_path('uploads/support'), $fileName);
                $img[]=array("image"=>"support/".$fileName);
            }
        }
        $reply->ticket_id=$request->ticket_id;
        $reply->comment=$request->comment;
        $reply->commented_by="user";
        $reply->images=$img;
        $reply->save();
        return redirect('/my-account/support/'.$request->ticket_id); 
    }   
}
