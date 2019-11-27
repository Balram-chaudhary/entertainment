@extends('layouts.frontend.main')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="recommended">
					<div class="recommended-grids english-grid">
						<div class="recommended-info">
							<div class="heading">
								<h3 class="text-center">Latest Gossips</h3>
							</div>
							
							<div class="clearfix"> </div>
						</div>
						@if(count($gossips)>0)
						@foreach($gossips as $g)
						<div class="col-md-3 resent-grid recommended-grid sports-recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="{{route('gossip.detail',$g->id)}}"><img src="{{asset('/images/'.$g->gimage)}}" alt="" /></a>
							</div>
							<div class="resent-grid-info recommended-grid-info">
								<h5><a href="{{route('gossip.detail',$g->id)}}" class="title">{{$g->title}}</a></h5>
								<p class="views">2,114,200 views</p>
							</div>
						</div>
						@endforeach
						@else
						<div class="text-center">Data Not Found</div>
						@endif
						
						<div class="clearfix"> </div>
					</div>
				</div>
				
				
			</div>


	@stop		
