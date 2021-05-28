<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function category($slug){

        return view('frontend.category');
    }

    public function post($slug){

        return view('frontend.post');
    }

    public function tag($slug){
       
        return view('frontend.tag');
    }

    public function about(){
       
        return view('frontend.about');
    }

    public function contact(){

        return view('frontend.contact');
    }

}
