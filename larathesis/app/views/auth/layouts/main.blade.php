<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<!-- start: CSS -->
		{{ HTML::style('assets/bootstrap/stylesheets/css/bootstrap.css') }}
		{{ HTML::style('assets/elusive-icon/css/elusive-webfont.css') }}
	<!-- end  : CSS -->
</head>
<body>
	<!-- start: container-->
	<div class="container">
		@include('notifications')
		@yield('content')
	</div>
	<!-- end: container-->
	
	
		{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js')}}
		{{ HTML::script('assets/bootstrap/javascripts/js/bootstrap.js')}}
</body>
</html>