@extends('back.layout.app')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Banner Settings</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Banners</li>
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
                        Banner Title:
                </div>
            <div class="col-5">
            {{$banner->title}} 
            </div>
       </div>
       <div class="row bg-dark">

                    
            <div class="col-3">
                    Banner Text 1:
            </div>
            <div class="col-5">
            {!!$banner->text_1!!} 
            </div>
        </div>
        <div class="row bg-dark">

         
            <div class="col-3">
                    Banner Image:
            </div>
            <div class="col-5">
                <img src="{{asset('back/images/uploads/').'/'.$banner->image}}" class="img-responsive" style="height:200px; width:300px;" alt="">
             
            </div>
            </div>
        <div class="row bg-dark">

         
            <div class="col-3">
                    Banner Text 2:
            </div>
            <div class="col-5">
            {!!$banner->text_2!!} 
            </div>
            </div>

            <div class="row bg-dark">

         
            <div class="col-3">
                    Banner Text 3:
            </div>
            <div class="col-5">
            {!!$banner->text_3!!} 
            </div>
            </div>

            <div class="row bg-dark">

         
            <div class="col-3">
                    Banner Status:
            </div>
            <div class="col-5" >
            <p class="{{$banner->status=='active'?'text-success':'text-danger'}}">{{$banner->status}} </p>
            </div>
            </div>
            
      </div>
    </div>
  </div>
</section>
</div>




@endsection