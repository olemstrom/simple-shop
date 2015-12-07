<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="/styles/styles.css">
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
			        <li><a href="/admin">Home</a></li>
					<li><a href="/admin/add-product">Add product</a></li>
					<li><a href="/admin/add-category">Add category</a></li>
					<li><a href="/admin/modify-products">Manage products</a></li>
					<li><a href="/admin/modify-categories">Manage categories</a></li>
					<li><a href="/admin/manage-orders">Manage orders</a></li>
		      	</ul>
			    <ul class="nav navbar-nav navbar-right">
			    	<li><a href="/auth/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			    </ul>
		    </div>
		  </div>
		</nav>

		<div class="container">
			@yield('content')
		</div>

	@yield('scripts')
	</body>
</html>