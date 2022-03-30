@extends('back.layout.app')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Experts Settings</h1>
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
      <div class="col-12 col-sm-6 col-md-8 mb-3">
      
            <form action="{{route('experts.store')}}" method="POST"  enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Expertise</label>
                    <input type="text" name="expertise" class="form-control">
                    @error('expertise')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                     @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                
                <div class="form-group">
                    <label>Facebook Url</label>
                    <input type="text" name="facebook_url" class="form-control">
                    
                     @error('facebook_url')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group">
                    <label>Instagram Url</label>
                    <input type="text" name="instagram_url" class="form-control">
                     @error('instagram_url')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group">
                    <label>Twitter Url</label>
                    <input type="text" name="twitter_url" class="form-control">
                     @error('twitter_url')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group">
                    <label>LinkedIn Url</label>
                    <input type="text" name="linkedin_url" class="form-control">
                     @error('linkedin_url')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="text-center">
                  <input type="submit" value="Create" class="btn btn-primary col-md-5">
          
                   <a href="{{route('experts.index')}}" class="btn btn-light col-md-6">Cancel</a>
                </div>
            </form>
       
      </div>
    </div>
  </div>
</section>
</div>



@endsection

@section('beforeBodyClose')

@endsection