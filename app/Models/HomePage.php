<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'bannertext',
        'videotitle',
        'videourl',
        'title1text',
        'flowcontent',
        'featuredpacktitle',
        'testimonialstitle',
        'benefittitle',
        'flowtitle'
    ];
}