<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function bantuan(){
        return view('frontPage.bantuan');
    }
    public function about_us(){
        return view('frontPage.aboutus');
    }
    public function report(){
        return view('frontPage.report');
    }
}
