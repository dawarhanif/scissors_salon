@extends('back.layout.app')

@section('beforeHeadClose')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

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
                <td><div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" onchange="change_status({{$banner->id}})" id="customSwitches" {{$banner->status=='active'?'checked':''}}>
                  <label class="custom-control-label" for="customSwitches"></label>
                </div></td>
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function delete_banner(id) {
           
            Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                  url: "{{route('banners.destroy','')}}"+ "/" + id,
                  datatype: 'json',
                  method: 'DELETE',
                  data: {"id":id, "_token": "{{ csrf_token() }}"},
                  success: function($data) {
                    if ($data.success) {
                            swal.fire("Done!", $data.message, "success").then(function(){
                              location.reload();
                            });
                            
                        } else {
                            swal.fire("Error!", 'Sumething went wrong.', "error");
                        }
                  }

              });
                }
            })
        };

</script>
<script>
  function change_status(id){
    console.log(id);
  }
</script>
@endsection