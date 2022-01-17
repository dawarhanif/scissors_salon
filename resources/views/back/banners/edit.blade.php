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
      <div class="col-12 col-sm-6 col-md-8 mb-3">
      
            <form action="{{route('banners.update',$banner->id)}}" method="POST"  enctype="multipart/form-data">
              @csrf
              @method('PUT')
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="{{$banner->title}}" class="form-control">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" value = "{{$banner->image}}">
                     @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                     <div>
                         <img style="height:200px; width:300px;" src="{{asset('back/images/uploads/'.$banner->image)}}" class="img-rounded" alt="">
                     </div>
                </div>
                
                <div class="form-group">
                    <label>Banner Text 1</label>
                    <textarea name="text_1" cols="30" rows="10">{{$banner->text_1}}</textarea>
                    
                     @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group">
                    <label>Banner Text 2</label>
                    <textarea name="text_2" id="" cols="30" rows="10">{{$banner->text_2}}</textarea>
                   
                     @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group">
                    <label>Banner Text 3</label>
                    <textarea name="text_3" id="" cols="30" rows="10">{{$banner->text_3}}</textarea>
                     @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="text-center">
                  <input type="submit" value="Update" class="btn btn-primary col-md-5">
          
                   <a href="{{route('banners.index')}}" class="btn btn-light col-md-6">Cancel</a>
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
  var element = document.getElementById("banners_sidebar");
  element.classList.add('active');
</script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
  
    CKEDITOR.replace( 'text_1' );
    CKEDITOR.replace( 'text_2' );
    CKEDITOR.replace( 'text_3' );



</script>
@endsection