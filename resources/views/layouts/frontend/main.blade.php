<!DOCTYPE HTML>
<html>
<head>
<title>My Play a Entertainment Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Play Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap -->
<link href="{{asset('/frontend/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="{{asset('/frontend/css/dashboard.css')}}" rel="stylesheet">
<!-- Custom Theme files -->
<link href="{{asset('/frontend/css/style.css')}}" rel='stylesheet' type='text/css' media="all" />
<link href="{{asset('/frontend/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('/frontend/css/photos.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('/frontend/css/swipebox.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('/frontend/css/animate.css')}}" rel='stylesheet' type='text/css' />
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- //fonts -->
</head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{route('home')}}"><h1><img src="{{asset('/frontend/images/logo.png')}}" alt="" /></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="header-top-right">
				<div class="file">
					<a href="{{route('upload')}}">Upload</a>
				</div>	
				
				<div class="clearfix"> </div>
			</div>
        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>
	
        <div class="col-sm-3 col-md-2 sidebar">
			<div class="top-navigation">
				<div class="t-menu">MENU</div>
				<div class="t-img">
					<img src="{{asset('/frontend/images/lines.png')}}" alt="" />
				</div>
				<div class="clearfix"> </div>
			</div>
				<div class="drop-navigation drop-navigation">
				  <ul class="nav nav-sidebar">
				  	<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{route('home')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li class="{{ Request::is('videos/result')? 'active' : '' }}"><a href="{{route('videos.result')}}"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Videos</a></li>
					<li class="{{ Request::is('sports/result')? 'active' : '' }}"><a href="{{route('sports.result')}}"><span class="glyphicon glyphicon-king" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sports</a></li>
			     		<li class="{{ Request::is('pictures/result') ? 'active' : '' }}"><a href="{{route('pictures.result')}}"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pictures</a></li>
					<li class="{{ Request::is('gossips/result') ? 'active' : '' }}"><a href="{{route('gossips.result')}}"><span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gossip</a></li>
					<li class="{{ Request::is('sayari-and-gagal') ? 'active' : '' }}"><a href="{{route('sayari.result')}}"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sayari And Gazal</a></li>
					<li class="{{ Request::is('quotes/result') ? 'active' : '' }}"><a href="{{route('quotes.result')}}"> <span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quotes</a></li>
				  </ul>
				  
					<div class="side-bottom">
						<div class="side-bottom-icons">
							<ul class="nav2">
								<li><a href="#" class="facebook"> </a></li>
								<li><a href="#" class="facebook twitter"> </a></li>
								<li><a href="#" class="facebook chrome"> </a></li>
								<li><a href="#" class="facebook dribbble"> </a></li>
							</ul>
						</div>
						<div class="copyright">
							<p>Copyright © 2018 Xexda. All Rights Reserved | Design by <a href="https:triporbitz.com">TripOrbitz</a></p>
						</div>
					</div>
				</div>
        </div>
        

    @yield('content')

			    
<script src="{{asset('/frontend/js/jquery-1.11.1.min.js')}}"></script>
 <script src="{{asset('/frontend/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/frontend/js/modernizr.custom.min.js')}}"></script>  
<script src="{{asset('/frontend/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
<!--start-smoth-scrolling-->
<script src="{{asset('/frontend/js/responsiveslides.min.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.swipebox.min.js')}}"></script> 
    <script type="text/javascript">
		jQuery(function($) {
			$(".swipebox").swipebox();
		});
	</script>
<!------ Eng Light Box ------>	
<script src="{{asset('/frontend/js/wow.min.js')}}"></script>
<script>
	new WOW().init();
</script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
                 <script>
							$( "li a.menu1" ).click(function() {
							$( "ul.cl-effect-2" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
						<script>
							$( "li a.menu" ).click(function() {
							$( "ul.cl-effect-1" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
						<!-- script-for-menu -->
						<script>
							$( ".top-navigation" ).click(function() {
							$( ".drop-navigation" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
                                <script>
											$(document).ready(function() {
											$('.popup-with-zoom-anim').magnificPopup({
												type: 'inline',
												fixedContentPos: false,
												fixedBgPos: true,
												overflowY: 'auto',
												closeBtnInside: true,
												preloader: false,
												midClick: true,
												removalDelay: 300,
												mainClass: 'my-mfp-zoom-in'
											});
																											
											});
									</script>

                   
						 <script>
							// You can also use "$(window).load(function() {"
							$(function () {
							  // Slideshow 4
							  $("#slider3").responsiveSlides({
								auto: true,
								pager: false,
								nav: true,
								speed: 500,
								namespace: "callbacks",
								before: function () {
								  $('.events').append("<li>before event fired.</li>");
								},
								after: function () {
								  $('.events').append("<li>after event fired.</li>");
								}
							  });
						
							});
						  </script>


  </body>
</html>