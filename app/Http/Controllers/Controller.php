<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\SocialMedia;
use App\Models\CommonBlock;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct() 
    {
        // Fetch the Site Settings object
        $contact_details=Contact::get()->first();
        $site_setting=Setting::get()->first();
        $social_media=SocialMedia::get();
        $commons=CommonBlock::get();
        View::share('contact_details', $contact_details);
        View::share('site_setting', $site_setting);
        View::share('social_media', $social_media);
        View::share('commons', $commons);
    }

}
