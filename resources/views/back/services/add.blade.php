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
      <div class="col-12 col-sm-6 col-md-8 mb-3">
      
            <form action="{{route('services.store')}}" method="POST"  enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control">
                     @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="img" class="form-control">
                     @error('img')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" cols="30" rows="10"></textarea>
                    
                     @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                
                
                <div class="form-group">
                    <label>Category</label>
                    <select>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                     @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                
                <div class="text-center">
                  <input type="submit" value="Create" class="btn btn-primary col-md-5">
          
                   <a href="{{route('services.index')}}" class="btn btn-light col-md-6">Cancel</a>
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
  var element = document.getElementById("services_sidebar");
  element.classList.add('active');
</script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
  
    CKEDITOR.replace( 'description' );



</script>
<script>
    $(document).ready(function(){
    $('#title').blur(function(){
        name = $('#title').val();
        
        $.ajax({
                  url: "{{route('check_slug_service')}}",
                  datatype: 'json',
                  method: 'GET',
                  data: {"name":name, "_token": "{{ csrf_token() }}"},
                  success: function($data1) {
                    let $data = jQuery.parseJSON($data1);
                    
                    $('#slug').val($data.slug);
                    if($data.error == "failed"){
                        swal.fire("This Slug already exists!", "", "error").then(function(){
                              $('#slug').val();
                            });
                        
                        
                    }
               
                  }

              });
    });
});
</script>

@endsection