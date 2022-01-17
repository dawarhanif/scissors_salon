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
        @if(isset($message))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert_success">
        {{$message}}
        
        </div>
        @endif
        <a href="{{ route('banners.create')}}" class="btn btn-success btn-block">Create a new Banner</a>
       <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Banner Title</th>
                    <th>Image</th>
                    <th>Banner Text 1</th>
                    <th>Banner Text 2</th>
                    <th>Banner Text 3</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                @foreach($banners as $banner)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$banner->title}}</td>
                <td><img src="{{asset('back/images/uploads/'.$banner->image)}}" style="height:50px; width:50px;" alt=""></td>
                <td>{{$banner->text_1}}</td>
                <td>{{$banner->text_2}}</td>
                <td>{{$banner->text_3}}</td>
                <td>{{$banner->status}}</td>
                <td><a  href="javascript:void(0)" onclick="delete_banner({{$banner->id}})" class="btn btn-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i></a>
                <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a></td>

                </tr>
                @endforeach
            </table>
       </div>
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


<script>
  setTimeout(function () {
  
  // Closing the alert
  $('#alert_success').alert('close');
}, 5000);
</script>


<script>
  function delete_banner(id) {
    
    $.ajax({
    url: 'admin/banners/'+id,
    type: 'DELETE',
    data: {
            "id": id,
        },
    success: function(result) {
       console.log(result);
    }
});
  }
</script>
@endsection