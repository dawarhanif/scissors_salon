<?php

namespace App\Http\Controllers\Front;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\About_us;
use App\Models\Service;
use App\Models\Service_Category;





class HomeController extends Controller
{
    public function index(Request $request)
    {
        $title="Home";
        $banners = Banner::where('status','active')->get();
        $about = About_us::first();
        $services = Service::where('status','active')->orderBy('updated_at','desc')->paginate(3);
        $service_categories = Service_Category::where('status','active')->get();
        return view('front.home.index', compact('title','banners','about','services','service_categories'));
    }

    
}
