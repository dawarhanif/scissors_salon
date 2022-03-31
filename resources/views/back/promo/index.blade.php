@extends('back.layout.app')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Promo Banner</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Promo Banner</li>
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
        <form action="{{route('save_promo')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>
              Promo Image
            </label>
            <input type="file" class="form-control" name="logo">  
            @error('logo')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @if($promo->logo)
            <div class="col-md-12 mt-2">
                <img height="50" width="60%" src="{{asset('back/images/uploads/promo_image/'.$promo->logo)}}" alt="">
            </div>
            @endif
          </div>
          <div class="form-group">
            <label>
              Caption
            </label>
            @error('caption')
             <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            <input type="text" value="{{$promo->caption}}" class="form-control" name="caption">
          </div>
 
          <div class="form-group">
            <label>
              Button URL 
            </label>        
             @error('button_url')
             <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            <input type="text" value="{{$promo->button_url}}" class="form-control" name="button_url">
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
  var element = document.getElementById("promo_sidebar");
  element.classList.add('active');
</script>

@endsection