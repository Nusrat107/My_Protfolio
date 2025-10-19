<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Skill;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index()
    {
        $banner = Banner::first();
        $about = About::first();
        $skills = Skill::all();
        return view('frontend.index', compact('banner', 'about','skills'));
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
