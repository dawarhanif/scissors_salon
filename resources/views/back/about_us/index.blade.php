@extends('back.layout.app')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">About Us</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">About Us</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-8 mb-3">
        <form action="{{route('about-us.update',$about->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>
              Image
            </label>
            <input type="file" class="form-control" name="img"> 
            @error('img')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @if($about->img)
            <div class="col-md-12 mt-2">
                <img src="{{asset('back/images/uploads/'.$about->img)}}" style="height:100px; width:100px;" alt="">
            </div>
            @endif
          </div>
          <div class="form-group">
            <label>
              Title
            </label>
            @error('title')
             <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <textarea name="title" id="" cols="30" rows="10">{{$about->title}}</textarea>
            
          </div>
 
          <div class="form-group">
            <label>
              Description
            </label>        
             @error('Description')
             <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <textarea name="description" id="" cols="30" rows="10">
          {{$about->description}}
          </textarea>
           
          </div>
          
          <div class="text-center">
          <input type="submit" value="Update" class="btn btn-primary col-md-5">
          
          <a href="{{route('dashboard')}}" class="btn btn-light col-md-6">Cancel</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
</div>



@endsection

@section('beforeBodyClose')

<script>
  var element = document.getElementById("about_sidebar");
  element.classList.add('active');
</script>

<script>
  setTimeout(function () {
  
  // Closing the alert
  $('#alert_success').alert('close');
}, 5000);
</script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
  
    CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'title' );




</script>
@endsection