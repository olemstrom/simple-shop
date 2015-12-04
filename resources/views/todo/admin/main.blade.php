<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="styles/styles.css">
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
			    	<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			    </ul>
		    </div>
		  </div>
		</nav>

		<div class="container">
			@yield('content')
		</div>

		<footer class="container-fluid bg-4 text-center">
			<p>Online store</p>
		</footer>
	</body>
</html>