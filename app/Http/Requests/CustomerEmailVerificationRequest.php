<?php
namespace App\Http\Requests;
use App\Models\Customer;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Http\FormRequest;

class CustomerEmailVerificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $customer = Customer::find($this->route('id'));
        if (! hash_equals((string) $this->route('id'),
                    (string) $customer->getKey())) {
            return false;
        }

        if (! hash_equals((string) $this->route('hash'),
                sha1($customer->getEmailForVerification()))) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function fulfill()
    {
        $customer = Customer::find($this->route('id'));
        if (!$customer->hasVerifiedEmail()) {
            $customer->markEmailAsVerified();

            event(new Verified($customer));
        }
    }

    public function withValidator($validator)
    {
        return $validator;
    }
}
