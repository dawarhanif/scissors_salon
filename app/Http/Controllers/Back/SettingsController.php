<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Setting;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $settings = Setting::first();
        return view('back.settings.index',compact('settings'));
    }
    public function save(Request $request){
        
        
        $validated = $request->validate([
            'image' => 'required|max:10000',
            'phone' => 'required',
            'email' => 'email',
        
        ]);
        $settings = Setting::find(1);
        if($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move('back/images/uploads', $imageName);
            $settings->logo = $imageName;
        }
        
        $settings->phone=$request->phone;
        $settings->email=$request->email;
        $settings->address=$request->address;
       
        $settings->save();
        return view('back.settings.index',compact('settings'));

    }
}
