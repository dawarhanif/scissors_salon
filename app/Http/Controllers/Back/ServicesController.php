<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Service_Category;
use Illuminate\Support\Str;
use Validator;



class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        
        return view('back.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Service_Category::where('status','active')->get();
     return view('back.services.add',compact('categories'));
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
            'img' => 'required|max:10000',
            'title' => 'required|string',
            'description' => 'required|string',
            'slug' => 'string|unique:service__categories,slug',
            'category' => 'required|integer',

        
        ]);
        $services = new Service();
        if($request->hasFile('img')) {
            $imageName = $request->img->getClientOriginalName();
            $request->img->move('back/images/uploads', $imageName);
            $services->img = $imageName;
        }
        
        $services->title=$request->title;
        $services->description=$request->description;
        $services->slug=$request->slug;
        $services->category_id=$request->category;
        
        $services->save(); 
        $message = "Service Created Successfully";
        return redirect(route('services.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $service = Service::where('slug',$slug)->first();
        return view('back.services.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $service = Service::where('slug',$slug)->first();
        $categories = Service_Category::where('status','active')->get();
       
        return view('back.services.edit',compact('service','categories'));
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
        $validated = $request->validate([
            
            'title' => 'required|string',
            'description' => 'required|string',
            'slug' => 'string|unique:service__categories,slug',
            'category' => 'required|integer',

        
        ]);
        $services = Service::find($id);

        if($request->hasFile('img')) {
            $imageName = $request->img->getClientOriginalName();
            $request->img->move('back/images/uploads', $imageName);
            $services->img = $imageName;
        }
        
        $services->title=$request->title;
        $services->description=$request->description;
        $services->slug=$request->slug;
        $services->category_id=$request->category;
        
        $services->update(); 
        $message = "Service Updated Successfully";
        return redirect(route('services.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete($id);
        
        return response()->json([
        'success' => 'Record deleted successfully!'
    ]);
    }
    public function slugCheck(Request $request)
    {
        $slug = Str::slug($request->name,'-');        
    $validator = Validator::make(['slug' => $slug], [
    
    'slug' => 'string|unique:services,slug',
    ]);
    $error = 'success';
    if ($validator->fails()){
        $error = "failed";        
    }
    echo json_encode(['slug'=>$slug,'error'=>$error]);
   
    }
    public function change_status(Request $request){
        $id = $request->banner_status;
        $service = Service::find($id);
        if($service->status=='active'){
            $service->status = 'disabled';
            $service->save();
        }
        else{
            $service->status = 'active';
            $service->save();
        }
        return response("Status Changed");
    }
}
