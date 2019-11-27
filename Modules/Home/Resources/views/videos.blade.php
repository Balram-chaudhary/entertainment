@extends('layouts.frontend.main')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-8 show-grid-left main-grids">
					<div class="recommended">
						<div class="recommended-grids english-grid">
							<div class="recommended-info">
								<div class="heading">
									<h3 class="text-center">Videos</h3>
								</div>
								
								<div class="clearfix"> </div>
							</div>
							@if(count($videos)>0)
							@foreach($videos as $v)
							<div class="col-md-4 resent-grid recommended-grid movie-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="{{route('videos.detail',$v->id)}}"><img src="{{asset('/images/'.$v->image)}}" alt="" /></a>
									
								</div>
								<div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
									<h5><a href="{{route('videos.detail',$v->id)}}" class="title text-center">{{$v->vname}}</a></h5>
									<ul>
										<li class="right-list"><p class="views views-info">2,114,200 views</p></li>
									</ul>
								</div>
							</div>
							@endforeach
							@endif
						
							
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
	   <div class="col-md-4 single-right">
          <h3>Other Videos</h3>
          @if(count($others)>0)
          @foreach($others as $o)
          <div class="single-grid-right">
            <div class="single-right-grids">
              <div class="col-md-4 single-right-grid-left">
                <a href="{{route('videos.detail',$o->id)}}"><img src="{{asset('/images/'.$o->image)}}" alt="" /></a>
              </div>
              <div class="col-md-8 single-right-grid-right">
                <a href="{{route('videos.detail',$o->id)}}" class="title">{{$o->vname}}</a>
                <p class="views">2,114,200 views</p>
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
          @endforeach
          @else
          <div>No Result Found</div>
          @endif
        </div>

				<div class="clearfix"> </div>
			</div>

		@stop