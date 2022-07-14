<?php
namespace App\Http\Controllers\Auth;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\RegisterRequest;
use App\Traits\Response\ResponseTrait;

class RegisterController extends Controller
{
    use ResponseTrait;

    public function showRegisterForm()
    {
        return view('auth.register');
    }
    protected function createCustomer(RegisterRequest $request)
    {
        $data = $this->hashPassword( $request->validated() );
        $customer = Customer::create($data);
        if(!$customer){
            return $this->jsonResponseFail(
                'Email is already in Use!',
                 422
             );
        }
        //send verification email 
        event(new Registered($customer));
        return $this->jsonResponseSuccess();
    }
    protected function hashPassword(array $data): array
    {
        $data['password'] = Hash::make($data['password']);

        return $data;
    }
}