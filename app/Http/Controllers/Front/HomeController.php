<?php

namespace App\Http\Controllers\Front;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $title="Home";
        return view('front.home.index', compact('title'));
    }

    
}
