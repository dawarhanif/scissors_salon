@extends('back.layout.app')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Settings</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Settings</li>
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
        <form action="{{route('save_settings')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>
              Image
            </label>
            <input type="file" class="form-control" name="image"> 
            @error('image')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @if($settings->logo)
            <div class="col-md-12 mt-2">
                <img src="{{asset('back/images/uploads/'.$settings->logo)}}" alt="">
            </div>
            @endif
          </div>
          <div class="form-group">
            <label>
              Phone Number
            </label>
            @error('phone')
             <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            <input type="text" value="{{$settings->phone}}" class="form-control" name="phone">
          </div>
 
          <div class="form-group">
            <label>
              Email
            </label>        
             @error('email')
             <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            <input type="email" value="{{$settings->email}}" class="form-control" name="email">
          </div>
          <div class="form-group">
            <label>
              Address
            </label>
            <textarea name="address"  cols="30" rows="10" class="form-control">{{$settings->address}}</textarea>
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
  var element = document.getElementById("settings_sidebar");
  element.classList.add('active');
</script>

@endsection