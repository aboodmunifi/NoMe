<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function home(){
        return view('front.index');
    }
    public function about(){
        return view('front.about');
    }
    public function centers(){
        return view('front.centers');
    }
    public function products(){
        return view('front.products');
    }
    public function productpage(){
        return view('front.productpage');
    }
    public function contact(){
        return view('front.contact');
    }


   
}
