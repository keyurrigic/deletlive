<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Traits\Response\ResponseTrait;
use App\Http\Requests\CustomerEmailVerificationRequest;
use App\Models\Customer;
use Auth;
use Mail;

class LoginController extends Controller
{
    use ResponseTrait;
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function Login(LoginRequest $request)
    {
    
        $user=Customer::where('email', $request->email)->first();
        if($user){
            if(empty($user->email_verified_at)){
                return $this->jsonResponseFail(
                    'please verify your mail',
                    423
                );
            }
        }else{
            return $this->jsonResponseFail(
                'Invalid Username / Password',
                 422
             );
        }
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return $this->jsonResponseSuccess();
        }
        else{
            return $this->jsonResponseFail(
                'Invalid Username / Password',
                 422
             );
        }
        //return back()->withInput($request->only('email', 'remember'));
    }
    public function verification(CustomerEmailVerificationRequest $request){
        $request->fulfill();
        return view('auth.verify-email');
    }
    public function Logout() {
        Auth::guard('customer')->logout();  
        return Redirect('/');
    }
}