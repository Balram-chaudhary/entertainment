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
            <form  action="" class="form-horizontal formpadding" id="videos" method="POST" enctype="multipart/form-data" file="true" name="videos">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
             <input type="hidden" name="video_id" value="{{$videos->id}}">
              <input type="hidden" name="old_video_image" value="{{$videos->image}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Vidos Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="vname" id="vname" placeholder="Videos Name" value="{{$videos->vname}}" required="required">
                      <span class="help-block errortext">{{$errors->first('vname')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">URL</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="url" id="url" placeholder="URL Link" value="{{$videos->url}}" required="required">
                      <span class="help-block errortext">{{$errors->first('url')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                <label for="temp_address" class="col-sm-2 control-label"></label>
                 <div class="row">                
               <div class="col-lg-1 col-md-1 col-sm-1">
                 <a href="{{url('/images/'.$videos->image)}}"class="portfolio-box">
                  <img src="{{url('/images/'.$videos->image)}}"class="img-responsive" alt="images" width="100px" height="100px">
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
                    <label for="himage" class="col-sm-2 control-label">Hotel Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control"  name="images" id="images">
                       <span class="help-block errortext">{{$errors->first('images')}}</span>
                    </div>
                  </div>
                <div class="form-group">
                   <label for="rating" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
	                <select name="type" id="type" required="required">
        					  <option value="e"  @if($videos->type=='e') selected='selected' @endif>English</option>
        					  <option value="n"  @if($videos->type=='n') selected='selected' @endif>Nepali</option>
        					  <option value="h"  @if($videos->type=='h') selected='selected' @endif>Hindi</option>
        					</select>
                 </div>
                </div>
                <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Genre</label>
                    <div class="col-sm-10">
                  <select name="genre" id="genre" required="required">
                    <option value="c" @if($videos->genre=='c') selected='selected' @endif>Comedy</option>
                    <option value="a" @if($videos->type=='a') selected='selected' @endif>Action</option>
                    <option value="l" @if($videos->type=='l') selected='selected' @endif>Love</option>
                    <option value="f" @if($videos->type=='f') selected='selected' @endif>Family</option>
                    <option value="o" @if($videos->type=='o') selected='selected' @endif>Others</option>
                  </select>
                 </div>
                </div>
                 <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Is Approved</label>
                    <div class="col-sm-10">
                  <select name="is_approved" id="is_approved" required="required">
                    <option value="y" @if($videos->is_approved=='y') selected='selected' @endif>Yes</option>
                    <option value="n" @if($videos->is_approved=='n') selected='selected' @endif>No</option>
                  </select>
                 </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&edit" class="btn btn-success" onClick="return validate();" value="submit&edit" id="submit">submit & edit</button>
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