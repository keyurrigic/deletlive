<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname', 'phonenumber', 'address1','address2','country_id','state','city','postalcode'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
