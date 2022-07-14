<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment','images'
    ];

    protected $attributes = [
        'commented_by' => 'admin',
    ];
    
    protected $casts = [
        'images' => 'array',
     ];
}
