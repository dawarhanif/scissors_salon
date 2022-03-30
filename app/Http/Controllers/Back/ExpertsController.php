<?php

namespace App\Http\Controllers\Back;

use App\Models\Expert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experts = Expert::all();
        return view('back.experts.index',compact('experts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.experts.create');
        
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
            'name' => 'required|string',
            'expertise' => 'required|string',

        
        ]);
        $experts = new Expert();
        if($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move('back/images/uploads/experts', $imageName);
            $experts->image = $imageName;
        }
        $experts->expertise=$request->expertise;
        $experts->name=$request->name;
        $experts->instagram_url=$request->instagram_url;
        $experts->facebook_url=$request->facebook_url;
        $experts->linkedin_url=$request->linkedin_url;
        $experts->twitter_url=$request->twitter_url;


       
        $experts->save(); 
        $message = "Expert Created Successfully";
        return redirect(route('experts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\experts  $experts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expert = Expert::where('id',$id)->first();
        return view('back.experts.show',compact('expert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\experts  $experts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expert = Expert::where('id',$id)->first();
    
       
        return view('back.experts.edit',compact('expert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\experts  $experts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            
            'name' => 'required|string',
            'expertise' => 'required|string',
           

        
        ]);
        $expert = Expert::find($id);

        if($request->hasFile('img')) {
            $imageName = $request->img->getClientOriginalName();
            $request->img->move('back/images/uploads/experts', $imageName);
            $expert->image = $imageName;
        }
        
        
        $expert->name=$request->name;
        $expert->expertise=$request->expertise;
        $expert->instagram_url=$request->instagram_url;
        $expert->instagram_url=$request->facebook_url;
        $expert->instagram_url=$request->linkedin_url;
        $expert->instagram_url=$request->twitter_url;
        
        $expert->update(); 
        $message = "Expert Updated Successfully";
        return redirect(route('experts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\experts  $experts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expert::find($id)->delete($id);
        
        return response()->json([
        'success' => 'Expert deleted successfully!'
    ]);
    }
    public function change_status(Request $request){
        $id = $request->expert_status;
        $expert = Expert::find($id);
        if($expert->status=='active'){
            $expert->status = 'disabled';
            $expert->save();
        }
        else{
            $expert->status = 'active';
            $expert->save();
        }
        return response("Status Changed");
    }
}
