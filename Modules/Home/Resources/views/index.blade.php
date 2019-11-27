@extends('layouts.frontend.main')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="top-grids">
					<div class="recommended-info">
					</div>
					
					<div class="col-md-4 resent-grid recommended-grid slider-top-grids">
						<div class="resent-grid-img recommended-grid-img">
						<h4 class="text-center">Videos</h4> 
							<div class="hover-bg">
							 <a href="{{route('videos.result')}}" title="Videos" data-lightbox-gallery="gallery1">
				               <div class="hover-text">
				               </div>
				         
							   <img src="{{asset('/images/'.$image)}}" alt="" />
						     </a>
						    </div> 
					    <div class="wethoughthover-text">
				                 <a href="{{route('videos.result')}}" style="text-decoration:none;"><h4>Videos&nbsp;<span class="badge">{{count($videos)}}</span></h4></a>
				               </div>
						</div>
					</div>
					<div class="col-md-4 resent-grid recommended-grid slider-top-grids">
						<div class="resent-grid-img recommended-grid-img">
						 <h4 class="text-center">Sports</h4> 
							<div class="hover-bg">
							 <a href="{{route('sports.result')}}" title="Sports" data-lightbox-gallery="gallery1">
				               <div class="hover-text">
				               </div>
							   <img src="{{asset('/images/'.$simage)}}" alt="" />
						     </a>
						    </div> 
					  <div class="wethoughthover-text">
					  	 <a href="{{route('sports.result')}}" style="text-decoration:none;"><h4>Sports&nbsp;<span class="badge">{{count($sports)}}</span></h4></a>
					  </div>
						</div>
					</div>
					<div class="col-md-4 resent-grid recommended-grid slider-top-grids">
						<div class="resent-grid-img recommended-grid-img">
						<h4 class="text-center">Pictures</h4> 
							<div class="hover-bg">
							 <a href="{{route('pictures.result')}}" title="Pictures" data-lightbox-gallery="gallery1">
				               <div class="hover-text">
				               </div>
							   <img src="{{asset('/images/'.$pimage)}}" alt="" />
						     </a>
						    </div> 
					<div class="wethoughthover-text">
						<a href="{{route('pictures.result')}}" style="text-decoration:none;"><h4>Pictures&nbsp;<span class="badge">{{count($pictures)}}</span></h4></a>
					</div>
						</div>
					</div>
                    <div class="col-md-4 resent-grid recommended-grid slider-top-grids">
						<div class="resent-grid-img recommended-grid-img">
						  <h4 class="text-center">Gossip</h4> 
							<div class="hover-bg">
							 <a href="{{route('gossips.result')}}" title="Gossip" data-lightbox-gallery="gallery1">
				               <div class="hover-text">
				               </div>
							   <img src="{{asset('/images/'.$gimage)}}" alt="" />
						     </a>
						    </div> 
					<div class="wethoughthover-text">
						 <a href="{{route('gossips.result')}}" style="text-decoration:none;"><h4>Gossip&nbsp;<span class="badge">{{count($gossips)}}</span></h4></a>
					</div>
						</div>
					</div>
                  <div class="col-md-4 resent-grid recommended-grid slider-top-grids">
						<div class="resent-grid-img recommended-grid-img">
						<h4 class="text-center">Sayari And Gagal</h4> 
							<div class="hover-bg">
							 <a href="{{route('sayari.result')}}" title="Sayari and Gagal" data-lightbox-gallery="gallery1">
				               <div class="hover-text">
				               </div>
							   <img src="{{asset('/images/'.$sayariimage)}}" alt="" />
						     </a>
						    </div> 
					<div class="wethoughthover-text">
						 <a href="{{route('sayari.result')}}" style="text-decoration:none;"><h4>Sayari And Gagal&nbsp;<span class="badge">{{count($sayari)}}</span></h4></a>
					</div>
						</div>
					</div>
					<div class="col-md-4 resent-grid recommended-grid slider-top-grids">
						<div class="resent-grid-img recommended-grid-img">
						 <h4 class="text-center">Quotes</h4> 
							<div class="hover-bg">
							 <a href="{{route('quotes.result')}}" title="Quotes" data-lightbox-gallery="gallery1">
				               <div class="hover-text">
				               </div>
							   <img src="{{asset('/images/'.$qimage)}}" alt="" />
						     </a>
						    </div> 
					<div class="wethoughthover-text">
						 <a href="{{route('quotes.result')}}" style="text-decoration:none;"><h4>Quotes&nbsp;<span class="badge">{{count($quotes)}}</span></h4></a>
					</div>
						</div>
					</div>

					<div class="clearfix"> </div>
				</div>
					

@stop
