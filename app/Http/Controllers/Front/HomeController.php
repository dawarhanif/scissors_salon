<?php

namespace App\Http\Controllers\Front;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\About_us;
use App\Models\Service;
use App\Models\Service_Category;
use App\Models\ImageGallery;
use App\Models\Expert;
use App\Models\Promo;








class HomeController extends Controller
{
    public function index(Request $request)
    {
        $title="Home";
        $banners = Banner::where('status','active')->get();
        $about = About_us::first();
        $services = Service::where('status','active')->orderBy('updated_at','desc')->paginate(3);
        $service_categories = Service_Category::where('status','active')->get();
        $image_galleries = ImageGallery::all();
        $experts = Expert::where('status','active')->get();
        $promo = Promo::find(1);
        return view('front.home.index', compact('title','banners','about','services','service_categories','image_galleries','experts','promo'));
    }

    
}
