<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id','status','subject','description'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function replies(){
        return $this->hasMany(TicketReply::class);
    }
}
