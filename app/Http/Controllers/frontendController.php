<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function portfolioDetails()
    {
        return view('frontend.portfolioDetails');
    }
    public function serviceDetails()
    {
        return view('frontend.serviceDetails');
    }
    public function privacy()
    {
        return view('frontend.privacy');
    }
    public function starterPage()
    {
        return view('frontend.starter-page');
    }
    public function terms()
    {
        return view('frontend.terms');
    }
    public function error()
    {
        return view('frontend.404');
    }
}
