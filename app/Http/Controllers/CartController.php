<?php

namespace App\Http\Controllers;
use App\Http\Requests\CartRequest;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Traits\Response\ResponseTrait;
use Carbon\Carbon;

class CartController extends Controller
{
    use ResponseTrait;
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        //dd($cartItems);
        //return view('cart', compact('cartItems'));
        return view('cart',compact('cartItems'));
    }
    public function addToCart(Request $request){
     
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                //'softwareprice' => $request->softwareprice,
                //'deposite' => $request->deposite,
                'subtitle' => $request->subtitle,
            )
        ]);
        //here need to updpate cart total ... considering software price and deposite
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        //now first works with the qty
        $inputs=$request->all();
        $qtys=$inputs['qty'];
        if(!empty($qtys)){
            foreach($qtys as $id=>$qty){
                if(is_numeric($qty)){
                    if($qty==0)
                    {
                        //remove item from cart
                        \Cart::remove($id);
                    }else{
                        \Cart::update(
                            $id,
                            [
                                'quantity' => [
                                    'relative' => false,
                                    'value' => $qty
                                ],
                            ]
                        );
                    }
                }
            }
        }
        $cartItems = \Cart::getContent();
        return $this->jsonResponse(
            true,
            ['html'=>view('ajaxcart',['cartItems'=>$cartItems])->render(),'items'=>\Cart::getTotalQuantity()],
            200
        );
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        $cartItems = \Cart::getContent();
        //echo "<pre>";
       // print_r($cartItems);
        //die;
        echo \Cart::getTotal();
        
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
    public function couponcode(CartRequest $request){
        
        $code=Coupon::where('code', $request->couponcode)->first();
        if($code){
            $codeenddate=date('Y-m-d', strtotime($code->endDate. ' + 1 days'));
            $startDate = \Carbon\Carbon::createFromFormat('Y-m-d',$code->startdate);
            $endDate = \Carbon\Carbon::createFromFormat('Y-m-d',$codeenddate);
            $check = \Carbon\Carbon::now()->between($startDate,$endDate);
        
            if($check){
                //if applied add it to every item in the cart 
                $cartItems = \Cart::getContent();
				$condition = new \Darryldecode\Cart\CartCondition(array(
					'name' => $code->code.' '.$code->discount.'%',
					'type' => 'sale',
					'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
					'value' => '-'.$code->discount.'%',
				));

				\Cart::condition($condition);
				
				//\Cart::session($userId)->condition($condition); // for a speicifc user's cart
                /*foreach($cartItems as $item){
                    //update with condition
                    $itemCondition1 = new \Darryldecode\Cart\CartCondition(array(
                        'name' => $code->code.' '.$code->discount.'%',
                        'type' => 'sale',
                        'value' => '-'.$code->discount.'%',
                    ));
                    \Cart::update(
                        $item->id,
                        [
                            'conditions' => $itemCondition1,
                        ]
                    );
                }*/
                // return cart items and subtotals
                return $code;
            }
            else 
                return false;
        }
        else 
            return false;
    }
    public function qtyUpdate(Request $request){
        \Cart::update(
            $request->id,
            [
                'quantity' => $request->qty,
            ]
        );
        $cartItems = \Cart::getContent();
        return true;
    }
}
