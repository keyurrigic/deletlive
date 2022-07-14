<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $guard = 'customer';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password','remember_token'
    ];

    public function billing()
    {
        return $this->hasOne(BillingAddress::class);
    }

    public function shipping()
    {
        return $this->hasOne(ShippingAddress::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class)->orderBy('created_at','DESC');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class)->orderBy('created_at','DESC');
    }
}