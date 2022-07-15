<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Requests\CustomerEmailVerificationRequest;
use App\Models\Customer;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [IndexController::class,'index'])->name('index');
Route::get('/features', [IndexController::class,'features'])->name('features');
Route::get('/howitworks', [IndexController::class,'howitworks'])->name('howitworks');
Route::get('/pricing', [ProductController::class,'pricing'])->name('pricing');
Route::get('/contactus', [IndexController::class,'contactus'])->name('contactus');
Route::post('/inquiries', [IndexController::class,'inquiries'])->name('inquiries');


Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('couponcode', [CartController::class,'couponcode'])->name('cart.couponcode');
Route::post('removecouponcode', [CartController::class,'removeCouponCode'])->name('cart.removecouponcode');
Route::get('qtyUpdate', [CartController::class,'qtyUpdate'])->name('cart.qtyUpdate');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::get('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('sendtestorderemail', [StripeController::class, 'SendOrderEmail'])->name('sendtestorderemail');

/*Route::get('/cart', function(){
    return view('cart');
})->name('cart');*/

Route::middleware(['auth:customer'])->group(function () {
    Route::get('/my-account', [MyAccountController::class,'index'])->name('myaccount');
    Route::post('/my-account/changename',[MyAccountController::class,'changename'])->name('myaccount.changename');
    Route::post('/my-account/createticket',[MyAccountController::class,'createticket'])->name('myaccount.createticket');
    Route::post('/my-account/changepassword',[MyAccountController::class,'changepassword'])->name('myaccount.changepassword');
    Route::post('/my-account/replyticket',[MyAccountController::class,'replyticket'])->name('myaccount.replyticket');
    
    Route::get('/my-account/address', [MyAccountController::class,'address'])->name('myaccount.address');

    Route::post('/my-account/changeshippingaddress', [MyAccountController::class,'changeshippingaddress'])->name('myaccount.changeshippingaddress');
    Route::post('/my-account/changebillingaddress', [MyAccountController::class,'changebillingaddress'])->name('myaccount.changebillingaddress');

    Route::get('/my-account/orders', [MyAccountController::class,'orders'])->name('myaccount.orders');

    //Route::get('cartList', [CartController::class, 'cartList'])->name('cart.list');
    
    Route::get('/address', function(){
        return view('address');
    })->name('address');
    
    Route::get('/orders-billing', function(){
        return view('orders-billing');
    })->name('orders-billing');
    
    /*Route::get('/support', function(){
        return view('support');
    })->name('support');*/
    Route::get('/my-account/support', [MyAccountController::class,'support'])->name('support');
    Route::get('/my-account/support/{id}', [MyAccountController::class,'reply'])->name('reply');

    Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
    Route::get('stripe', [StripeController::class, 'stripePost'])->name('stripe.get');

    Route::get('/invoice/{id}', [StripeController::class, 'stripeInvoice'])->name('invoice');

});





Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'Login'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'Logout'])->name('logout');

Route::get('/register', [RegisterController::class,'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class,'createCustomer'])->name('create.customer');

/*Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');*/
Route::get('/email/verify/{id}/{hash}', [LoginController::class,'verification'])->name('verification.verify');

/*Route::get('/email/verify/{id}/{hash}', function (CustomerEmailVerificationRequest $request) {
    $request->fulfill();
    return view('auth.verify-email');
})->name('verification.verify');*/