<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'headerlogo',
        'footerlogo',
        'footercontent',
        'trytitle',
        'trydescription',
        'trybuttontext',
        'trybuttonlink',
        'howitworktitle',
        'howitworkcontent'
    ];
}
