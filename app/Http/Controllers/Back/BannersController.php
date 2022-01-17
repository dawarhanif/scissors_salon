<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;


class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all(); 
        return view('back.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.banners.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'image' => 'required|max:10000',
            'title' => 'required|string',
            'text_1' => 'required|string',
            'text_2' => 'required|string',
            'text_3' => 'required|string',

        
        ]);
        $banners = new Banner();
        if($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move('back/images/uploads', $imageName);
            $banners->image = $imageName;
        }
        
        $banners->title=$request->title;
        $banners->text_1=$request->text_1;
        $banners->text_2=$request->text_2;
        $banners->text_3=$request->text_3;
       
        $banners->save(); 
        $message = "Banner Created Successfully";
        return redirect(route('banners.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Banner::find($id)->delete($id);
        
        return response()->json([
        'success' => 'Record deleted successfully!'
    ]);
    }
    public function change_status(Request $request){
        $id = $request->banner_status;
        $banner = Banner::find($id);
        if($banner->status=='active'){
            $banner->status = 'disabled';
            $banner->save();
        }
        else{
            $banner->status = 'active';
            $banner->save();
        }
        return response("Status Changed");
    }
}
