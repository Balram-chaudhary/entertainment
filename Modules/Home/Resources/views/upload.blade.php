@extends('layouts.frontend.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
       <section class="content">
        <div class="row">
        <!-- left column -->
       <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="{{route('upload.submit')}}" class="form-horizontal formpadding" id="pictures" method="POST" enctype="multipart/form-data" file="true" name="pictures">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
              <div class="box-body">
              	 <section class="content-header">
			      @if(Session::get('success_msg'))
			          <div class="alert alert-success">
				         <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				          {{ Session::get('success_msg') }}
				       </div>
			          @endif
			          @if(Session::get('error_msg'))
			          <div class="alert alert-success">
			          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			          {{ Session::get('error_msg') }}
			          </div>
			          @endif

			    </section>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Image Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name of The Image" value="{{old('name')}}" required="required">
                      <span class="help-block errortext">{{$errors->first('name')}}</span>
                  </div>
                </div>
                <div class="form-group " id="imageselection">
                    <label for="image" class="col-sm-2 control-label">Select Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-cont rol roltwo" onchange="validateImage()"  name="images" id="images"   value="{{old('images')}}" required="required">
                       <span class="help-block errortext">{{$errors->first('images')}}</span>
                    </div>
                  </div>
                <div class="form-group typestylesheet">
                   <label for="rating" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
	                <select name="type" id="type" required="required">
        					  <option value="s">Sayari And Gagal</option>
        					  <option value="p">Pictures</option>
        					  <option value="q">Quotes</option>
        			</select>
                 </div>
                </div>
 
                <div class="form-group typestylesheet">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&upload" class="btn btn-success" onClick="return validate();" value="submit&upload" id="submit">Upload</button>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
        
        </div>
       
     
      </div>
      <!-- /.row -->
    </section>
  </div>
 
@stop
@section('footer_resources')
<script type="text/javascript">
    $(document).ready(function(){
        $('#images').change(function(){
               var fp = $("#images");
               var lg = fp[0].files.length; // get length
               var items = fp[0].files;
               var fileSize = 0;
           
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   fileSize = fileSize+items[i].size; // get file size
               }
               if(fileSize > 2000000) {
                    alert('File size must not be more than 2 MB');
                    $('#images').val('');
               }
               if(lg > 8){
                alert('images must not be more than 8');
                    $('#images').val('');
             }

           }
        });
    });
    </script>
 @stop