<?php

namespace App\Http\Controllers\Front;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\About_us;



class HomeController extends Controller
{
    public function index(Request $request)
    {
        $title="Home";
        $banners = Banner::where('status','active')->get();
        $about = About_us::first();
        return view('front.home.index', compact('title','banners','about'));
    }

    
}
