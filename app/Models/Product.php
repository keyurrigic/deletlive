<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'subtitle', 'price','mimumqty','softwareprice','deposite','description','frquency','hardware_included'
    ];
}
