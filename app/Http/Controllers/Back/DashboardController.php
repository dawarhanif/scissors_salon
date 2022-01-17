<?php

namespace App\Http\Controllers\Back;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $title="Home";
        return view('back.layout.app', compact('title'));
    }

    
}