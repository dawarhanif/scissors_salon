<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promo;


class PromoController extends Controller
{
    public function index(){
        $promo = Promo::first();
        return view('back.promo.index',compact('promo'));
    }
    public function save(Request $request){
  
        $validated = $request->validate([
            'caption' => 'required',
            'button_url' => 'required',
        
        ]);
        $promo = Promo::find(1);
      

        if($request->hasFile('logo')) {
            $imageName = $request->logo->getClientOriginalName();
            $request->logo->move('back/images/uploads/promo_image', $imageName);
            $promo->logo = $imageName;
        }
        
        $promo->caption=$request->caption;
        $promo->button_url=$request->button_url;
       
        $promo->update();
        return redirect(route('promo'));

    }
}
