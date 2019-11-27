@extends('layouts.backend.main')
@section('content')
@include('layouts.backend.admin.nav')
@include('layouts.backend.admin.sidebar')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>   
        <ol class="breadcrumb">
       {!!$breadcrumbs!!}
      </ol>
       {{-- <a href="javascript:history.back()" class="btn btn-primary breadCrumbRightBackBtn">Back</a> --}}
    </h4>
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
            <form  action="" class="form-horizontal formpadding" id="sports" method="POST" enctype="multipart/form-data" file="true" name="quotes">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
             <input type="hidden" name="sports_id" value="{{$sports->id}}">
              <input type="hidden" name="old_sports_image" value="{{$sports->image}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Sports Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sname" id="sname" placeholder="Enter Name of the Sports" value="{{$sports->sname}}" required="required">
                      <span class="help-block errortext">{{$errors->first('sname')}}</span>
                  </div>
                </div>
               
                 <div class="form-group">
                <label for="temp_address" class="col-sm-2 control-label"></label>
                 <div class="row">
                 
               <div class="col-lg-1 col-md-1 col-sm-1">
                 <a href="{{url('/images/'.$sports->image)}}"class="portfolio-box">
                  <img src="{{url('/images/'.$sports->image)}}"class="img-responsive" alt="images" width="100px" height="100px">
                  <div class="portfolio-box-caption">
                    <div class="portfolio-box-caption-content">
                    <span class="glyphicon glyphicon-zoom-in" style="font-size: 20px"></span>
                    </div>
                  </div>
                 </a>
               </div>
               </div> 
              </div>
              
                <div class="form-group">
                    <label for="himage" class="col-sm-2 control-label">Upload Gossips Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control"  name="images" id="images">
                       <span class="help-block errortext">{{$errors->first('images')}}</span>
                    </div>
                  </div>



                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description" placeholder="Hotel Description" rows="10" cols="90" required="required" >{{$sports->description}}</textarea>
                  </div>
                    <span class="help-block errortext"></span>
                </div>
                 <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                  <select name="stype" id="stype" required="required">
                    <option value="c" @if($sports->stype=='c') selected='selected' @endif>Cricket</option>
                    <option value="f" @if($sports->stype=='f') selected='selected' @endif>Funny</option>
                    <option value="v" @if($sports->stype=='v') selected='selected' @endif>Vollyball</option>
                    <option value="b" @if($sports->stype=='b') selected='selected' @endif>Basketball</option>
                    <option value="k" @if($sports->stype=='k') selected='selected' @endif>Kabaddi</option>
                    <option value="bt" @if($sports->stype=='bt') selected='selected' @endif>Batminton</option>
                    <option value="r" @if($sports->stype=='r') selected='selected' @endif>Raceling</option>
                    <option value="t" @if($sports->stype=='t') selected='selected' @endif>Tekwando</option>
                    <option value="m" @if($sports->stype=='m') selected='selected' @endif>Martial Art</option>
                    <option value="o" @if($sports->stype=='o') selected='selected' @endif>Others</option>
                  </select>
                 </div>
                </div>
                 <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Is Approved</label>
                    <div class="col-sm-10">
                  <select name="is_approved" id="is_approved" required="required">
                    <option value="y" @if($sports->is_approved=='y') selected='selected' @endif>Yes</option>
                    <option value="n" @if($sports->is_approved=='n') selected='selected' @endif>No</option>
                  </select>
                 </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&edit" class="btn btn-success" onClick="return validate();" value="submit&edit" id="submit">Submit & Edit</button>
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