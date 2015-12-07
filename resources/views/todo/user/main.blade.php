<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  		<script>
  			$(document).ready(function(){
  				$('.shopping-cart-btn').popover({
  					html: true,
  					content: $('.shopping-cart-content').html()
  				});

  			});
		</script>
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
		      	<a class="navbar-brand" href="/">Awsome Webstore</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      	<ul class="nav navbar-nav">
		      		<li class="{{activeClass('home')}}"><a href="/">Home</a></li>
		      		@foreach($navCategories as $category)
						<li class="{{activeClass($category)}}"><a href="/category/{{$category->name}}">{{$category->displayname}}</a></li>
		      		@endforeach
		      	</ul>
			    <ul class="nav navbar-nav navbar-right">
			    	<li><a href="#" class="shopping-cart-btn" data-toggle="popover" data-placement="bottom" title="Items in your shopping cart" ><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
			    </ul>
		    </div>
		  </div>
		</nav>

		<div class="container-fluid">
			<div class="col-md-8 text-center center-block">
				@yield('content')
			</div>
		</div>

		<!--
		<footer class="container-fluid bg-4 text-center">
			<p>Online store</p>
		</footer>
	-->

	<div class="shopping-cart-content" style="display:none;">
		@include("product.shopping_cart")
	</div>
	</body>
</html>