@extends('layouts.frontend.main')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-8 single-left">
					<div class="song">
						<div class="song-info">
							<h3>{{$videos->vname}}</h3>	
					</div>
						<div class="video-grid">
							<iframe src="{{$videos->url}}" allowfullscreen></iframe>
						</div>
					</div>
					<div class="song-grid-right">
						<div class="share">
							<h5>Share this</h5>
							<ul>
								<li><a href="#" class="icon fb-icon">Facebook</a></li>
								<li><a href="#" class="icon twitter-icon">Twitter</a></li>
								<li><a href="#" class="icon pinterest-icon">Pinterest</a></li>
								<li><a href="#" class="icon whatsapp-icon">Whatsapp</a></li>
								<li class="view">200 Views</li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
					<div class="col-md-12">
							
										<h4>Published on 15 June 2015</h4>
										<p style="font-size: 16px;"></p>
								
										<p style="font-size: 16px;>Nullam fringilla sagittis tortor ut rhoncus. Nam vel ultricies erat, vel sodales leo. Maecenas pellentesque, est suscipit laoreet tincidunt, ipsum tortor vestibulum leo, ac dignissim diam velit id tellus. Morbi luctus velit quis semper egestas. Nam condimentum sem eget ex iaculis bibendum. Nam tortor felis, commodo faucibus sollicitudin ac, luctus a turpis. Donec congue pretium nisl, sed fringilla tellus tempus in.</p>
										<p style="font-size: 16px;>Nullam fringilla sagittis tortor ut rhoncus. Nam vel ultricies erat, vel sodales leo. Maecenas pellentesque, est suscipit laoreet tincidunt, ipsum tortor vestibulum leo, ac dignissim diam velit id tellus. Morbi luctus velit quis semper egestas. Nam condimentum sem eget ex iaculis bibendum. Nam tortor felis, commodo faucibus sollicitudin ac, luctus a turpis. Donec congue pretium nisl, sed fringilla tellus tempus in.</p>
										
					</div>
				</div>
				<div class="col-md-4 single-right">
					<h3>Up Next</h3>
					@if(count($relatedvideos))
					@foreach($relatedvideos as $r)
					<div class="single-grid-right">
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="{{route('videos.detail',$r->id)}}"><img src="{{asset('/images/'.$r->image)}}" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="{{route('videos.detail',$r->id)}}" class="title">{{$r->vname}}</a>
								<p class="views">2,114,200 views</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					@endforeach
					@endif
				</div>
				<div class="clearfix"> </div>
			</div>



			@stop