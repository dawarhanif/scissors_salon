<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service_Category;
use Illuminate\Support\Str;
use Validator;

class ServiceCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Service_CAtegory::all();
        
        return view('back.service_categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.service_categories.create');
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
            'name' => 'required|max:30|string',
            'slug' => 'string|unique:service__categories,slug',

        
        ]);
        
        $categories = new Service_Category();
        
        $categories->name = $request->name;
        $categories->slug = $request->slug;
        $categories->save(); 
        return redirect()->route("service-categories.index")->with('success','Service Category Created Successfully');
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
        //
    }
    public function slugCheck(Request $request)
    {
        $slug = Str::slug($request->name,'-');        
    $validator = Validator::make(['slug' => $slug], [
    
    'slug' => 'string|unique:service__categories,slug',
    ]);
    $error = 'success';
    if ($validator->fails()){
        $error = "failed";        
    }
    echo json_encode(['slug'=>$slug,'error'=>$error]);
   
    }
    public function change_status(Request $request){
        $id = $request->category_status;
        $category = Service_Category::find($id);
        if($category->status=='active'){
            $category->status = 'disabled';
            $category->save();
        }
        else{
            $category->status = 'active';
            $category->save();
        }
        return response("Status Changed");
    }
}
