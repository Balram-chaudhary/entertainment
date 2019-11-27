@extends('layouts.frontend.main')
@section('content')
<!-- photos gallery -->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-10 show-grid-left main-grids">
					<div class="recommended">
   					   <div class="recommended-grids">
                        <div class="living_middle">
							   	  <div class="container">
							   	    <div class="entertain_box wow fadeInLeft" data-wow-delay="0.4s">
							   	    	@if(count($sayari)>0)
							   	    	@foreach($sayari as $s)
									   <div class="col-md-3 grid_box">
									   	   <a href="{{asset('/images/'.$s->simage)}}" class="swipebox"  title="Image Title"> <img src="{{asset('/images/'.$s->simage)}}" class="img-responsive" alt=""><span class="zoom-icon"></span> </a>
									   	  <div class="grid_box2">
										   <h4>{{$s->title}}</h4>
								          </div>
									   </div>
									   @endforeach
									   @else
									   <div>Data Not Found</div>
									   @endif
									   <div class="clearfix"> </div>
									 </div>	
									 
							     </div>
							   </div>
						   <div class="clearfix"> </div>
					   </div>
				    </div>
				</div>
			  <div class="clearfix"> </div>
			</div>
<!-- ends phot gallery -->
@stop
