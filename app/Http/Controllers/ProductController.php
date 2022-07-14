<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function pricing(){
        $products = Product::get();
        return view('pricing',['products'=>$products]);
    }
}
