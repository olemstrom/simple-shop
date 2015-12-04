<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  		<script>$(document).ready(function(){$('[data-toggle="popover"]').popover();});</script>
  		<link rel="stylesheet" href="styles.css">
		<title>Awsome Webstore</title>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
		  <div class="navigation">
		    <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			     	<span class="icon-bar"></span>                        
			    </button>
		      	<a class="navbar-brand" href="#">Awsome Webstore</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      	<ul class="nav navbar-nav">
			        @yield('tabs')
		      	</ul>
			    <ul class="nav navbar-nav navbar-right">
			    	<li><a href="" data-toggle="popover" data-placement="bottom" title="Items in your shopping cart" data-content="Empty"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
			    </ul>
		    </div>
		  </div>
		</nav>

		<div class="container">
			<div class="row text-center">
				<div class="col-md-2 sidenav">
					
				</div>
				<div class="col-md-8 text-center">
					@yield('content')
				</div>
				<div class="col-md-2 sidenav">
					
				</div>
			</div>
		</div>

		<footer class="container-fluid bg-4 text-center">
			<p>Online store</p>
		</footer>
	</body>
</html>