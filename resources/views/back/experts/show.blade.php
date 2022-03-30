@extends('back.layout.app')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Services Settings</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Experts</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-12 mb-3">
          <div class="row bg-dark">

         
                <div class="col-3">
                        Expert Name:
                </div>
                <div class="col-5">
                    {{$expert->name}} 
                </div>
            </div>
            <div class="row bg-dark">

         
                <div class="col-3">
                        Expert Image:
                </div>
                <div class="col-5">
                    <img height="300" width="200" src="{{ asset('back/images/uploads/experts/'. $expert->image) }}" alt="$expert->image">
                </div>
            </div>
            <div class="row bg-dark">

         
                <div class="col-3">
                        Expert Facebook URL :
                </div>
                <div class="col-5">
                    <input type="text" value="{{$expert->facebook_url}}" disabled>
                </div>
            </div>
            <div class="row bg-dark">

         
                <div class="col-3">
                        Expert Instagram URL :
                </div>
                <div class="col-5">
                    <input type="text" value="{{$expert->instagram_url}}" disabled>
                </div>
            </div>
            <div class="row bg-dark">

         
                <div class="col-3">
                        Expert Twitter URL :
                </div>
                <div class="col-5">
                    <input type="text" value="{{$expert->twitter_url}}" disabled>
                </div>
            </div>
            <div class="row bg-dark">

         
                <div class="col-3">
                        Expert LinkedIn URL :
                </div>
                <div class="col-5">
                    <input type="text" value="{{$expert->linked_url}}" disabled>
                </div>
            </div>
            <div class="row bg-dark">

         
                <div class="col-3">
                        Expert Status :
                </div>
                <div class="col-1">
                    @php
                        if($expert->status=='active')
                        {
                            $classname="success";
                        }
                        else
                        {
                            $classname = "danger";
                        }
                    @endphp
                <p class="text-white bg-{{$classname}}">
                    {{$expert->status}}
                </p>
                </div>
            </div>
      
      
           
            
      </div>
    </div>
  </div>
</section>
</div>




@endsection