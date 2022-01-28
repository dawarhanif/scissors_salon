@extends('back.layout.app')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Service Categories</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Service Categories</li>
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
      
            <form action="{{route('service-categories.store')}}" method="POST"  enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('slug')}}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" id="slug" value="{{old('slug')}}" class="form-control">

                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
               
                
                <div class="text-center">
                  <input type="submit" value="Create" class="btn btn-primary col-md-5">
          
                   <a href="{{route('service-categories.index')}}" class="btn btn-light col-md-6">Cancel</a>
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
  var element = document.getElementById("service_categories_sidebar");
  element.classList.add('active');
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
    $('#name').blur(function(){
        name = $('#name').val();
        
        $.ajax({
                  url: "{{route('check_slug_category')}}",
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