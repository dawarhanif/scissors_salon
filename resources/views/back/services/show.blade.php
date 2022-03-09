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
            <li class="breadcrumb-item active">Services</li>
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
                        Service Title:
                </div>
            <div class="col-5">
            {{$service->title}} 
            </div>
       </div>
       <div class="row bg-dark">

                
        <div class="col-3">
                Slug:
        </div>
        <div class="col-5">
        {!!$service->slug!!} 
        </div>
        </div>
       <div class="row bg-dark">

                    
            <div class="col-3">
                    Service Text Image:
            </div>
            <div class="col-5">
            <img src="{{ asset('back/images/uploads/'.$service->img) }}" height="250px" width="350px" alt="">
            </div>
        </div>
        <div class="row bg-dark">

         
            <div class="col-3">
                    Service Description:
            </div>
            <div class="col-5">
               {!!$service->description!!}
             
            </div>
            </div>
        <div class="row bg-dark">

         
            <div class="col-3">
                    Category:
            </div>
            <div class="col-5">
            <td>{!!$service->category->name!!}</td>
            </div>
            </div>
      
           
            
      </div>
    </div>
  </div>
</section>
</div>




@endsection