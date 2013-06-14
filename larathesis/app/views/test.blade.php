<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- start: CSS -->
	{{ HTML::style('assets/bootstrap/stylesheets/css/bootstrap.css') }}
	{{ HTML::style('assets/elusive-icon/css/elusive-webfont.css') }}
	<!-- end  : CSS -->
</head>
<body>
	<!-- laravel ribbon -->
	<a href="https://github.com/nicopenaredondo/larathesis"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>
	<!-- laravel ribbon-->
	<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#" name="top">Index Page</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li><a href="{{ URL::route('login') }}">Login</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
		<!--/.container-fluid -->
	</div>
	<!--/.navbar-inner -->
</div>
<!--/.navbar -->

	<!-- start: JS -->
	{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js') }}
	{{ HTML::script('assets/bootstrap/javascripts/js/bootstrap.js') }}
	<!-- end  : JS -->

</body>
</html>