@extends('back.layout.app')

@section('beforeHeadClose')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
      @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert_success">
        {!! \Session::get('success') !!}
        
        </div>
        @endif
        <a href="{{ route('service-categories.create')}}" class="btn btn-success btn-block">Create a new Category</a>
        <table class="table table-responsive">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            @foreach($categories as $category)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>
                                        <label class="switch">
                                         <input type="checkbox" id="togBtn" <?php echo $category->status== 'active' ? ' checked' : ''; ?> class="website_product_sell" value="<?php echo $category->id ?>">
                                         <div class="slider round">
                                        
                                          <strong class="on">Enabled</strong>

                                          
                                          <strong class="off">Disabled</strong>
                                          
                                          <!--END-->
                                         </div>
                                        </label></td>
                <td><a  href="javascript:void(0)" onclick="delete_category({{$category->id}})" class="btn btn-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i></a>
                <a href="{{route('service-categories.edit',$category->slug)}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                

                </tr>
            @endforeach
        </table>
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

<script>
  setTimeout(function () {
  
  // Closing the alert
  $('#alert_success').alert('close');
}, 5000);
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function delete_category(id) {
           
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
                  url: "{{route('service-categories.destroy','')}}"+ "/" + id,
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
        
        $('.website_product_sell').click(function(){

            var category_status = $(this).val();
            
         

            $.ajax({
                url:"{{route('change_category_status')}}",
                method:'get',
                data:{
                    "_token": "{{csrf_token()}}",
                    "category_status": category_status

                },
                success:function(response)
                {
                 
                   alertme('<i class="fa fa-check" aria-hidden="true"></i> Status Changed ','success',true,1500);
                   
                }
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