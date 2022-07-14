<?php
namespace App\Http\Controllers;
use App\Models\HomePage;
use App\Models\Testimonial;
use App\Models\Benefit;
use App\Models\Box;
use App\Models\Feature;
use App\Models\Step;
use App\Models\Inquiry;
use Illuminate\Support\Str;
use App\Traits\Response\ResponseTrait;
use App\Mail\InquiryMail;
use Mail; 
use Hash;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $homepage=HomePage::get()->first();
        $testimonials=Testimonial::get();
        $benefits=Benefit::get();
        $boxes=Box::get();
        return view('index',['homepage'=>$homepage,'testimonials'=>$testimonials,'benefits'=>$benefits,'boxes'=>$boxes]);
    }
    public function features(){
        $features=Feature::get();
        return view('features',['features'=>$features]);
    }
    public function howitworks(){
        $steps=Step::get();
        return view('how-it-works',['steps'=>$steps]);
    }
    public function contactus(){
        return view('contact-us');
    }
    public function inquiries(Request $request){
        $inquiry=new Inquiry;
        $token = Str::random(64);
        $inquiry->inquiry_type=$request->inquiry_type;
        $inquiry->name=$request->name;
        $inquiry->email=$request->email;
        $inquiry->phone=$request->phone;
        $inquiry->message=$request->message;
        $inquiry->save();
        Mail::to('vammecapatta-8035@yopmail.com')->send(new InquiryMail($inquiry));
        session()->flash('success', 'Thank you for contact us!!!');
        return redirect()->route('contactus');
    }
}
