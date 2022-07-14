<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'customer_id','order_id','subscriptionid','current_period_start','current_period_end','latest_invoice','jsonresponse'
    ];

}
