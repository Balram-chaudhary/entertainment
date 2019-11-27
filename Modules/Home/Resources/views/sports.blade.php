@extends('layouts.frontend.main')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="recommended">
					<div class="recommended-grids english-grid">
						<div class="recommended-info">
							<div class="heading">
								<h3 class="text-center">Sports</h3>
							</div>
							
							<div class="clearfix"> </div>
						</div>
						@if(count($sports)>0)
                        @foreach($sports as $s)
						<div class="col-md-3 resent-grid recommended-grid sports-recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="{{route('sports.detail',$s->id)}}"><img src="{{asset('/images/'.$s->image)}}" alt="" /></a>
							</div>
							<div class="resent-grid-info recommended-grid-info">
								<h5><a href="{{route('sports.detail',$s->id)}}" class="title">{{$s->sname}}</a></h5>
								<p class="views">2,114,200 views</p>
							</div>
						</div>
						@endforeach
						@endif
						
						<div class="clearfix"> </div>
					</div>
				</div>
				
				
			</div>


	@stop		
