@extends('back.layout.app')

@section('beforeHeadClose')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
    .close-icon{
    	border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
    .form-image-upload{
        
        padding: 15px;
    }
    .container{max-width:1170px !important; width:auto !important;}
    </style>
<style>
    
    .switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ca2222;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.on, .off
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}

input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/ Rounded sliders /
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;}
</style>
@endsection

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Image Gallery</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Gallery</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


<section class="content">
  
<div class="container">


<form action="{{ route('image_gallery_post') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">


    {!! csrf_field() !!}


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif


    <div class="row">
        <div class="col-md-5">
            <strong>Title:</strong>
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="col-md-5">
            <strong>Image:</strong>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col-md-2">
            <br/>
            <button type="submit" class="btn btn-success">Upload</button>
        </div>
    </div>


</form> 

<div class='list-group gallery'>
<div class="row">



        @if($images->count())
            @foreach($images as $image)
            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                <a class="thumbnail fancybox" rel="ligthbox" href="{{asset('back/images/uploads/'.$image->image )}}">
                    <img class="img-responsive" alt="" src="{{ asset('back/images/uploads/'.$image->image )}}" />
                    <div class='text-center'>
                        <small class='text-primary'>{{ $image->title }}</small>
                    </div> <!-- text-center / end -->
                </a>
               
                
                <a href="javascript:void(0)" onclick="image_gallery_delete({{$image->id}})" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
               
            </div> <!-- col-6 / end -->
            @endforeach
        @endif


    </div> <!-- list-group / end -->
</div> <!-- row / end -->
</div> <!-- container / end -->

</section>
</div>



@endsection

@section('beforeBodyClose')

<script>
  var element = document.getElementById("gallery_sidebar");
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
  function image_gallery_delete(id) {
           
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
                  url: "{{route('image_gallery_delete')}}",
                  datatype: 'json',
                  method: 'POST',
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
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
    <script>
function alertme(text,type,autoClose,closeAfterSec)

{

    var type= type ||  'success';

    var autoClose= autoClose ||  true;

    var closeAfterSec= closeAfterSec ||  3000;

    $(".alertme").hide();

    var mhtml='<div class="alertme" id="div_alert" style="margin:5px;top:3%;position:fixed;z-index:9999;width:100%">'+

    '<div style="max-width: 700px;margin: 0 auto;" class="alert alert-'+type+' alert-dismissible"> <button type="button" class="close" data-dismiss="alert">&times;</button> '+text+'</div></div>';

    $("body").append(mhtml);

    if(autoClose){

        setTimeout(function(){$(".alertme").hide(); }, closeAfterSec);

    }



}

    </script>
@endsection