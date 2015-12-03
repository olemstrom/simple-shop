@extends("product.product_main")
@section("title", "Product view")
@section("content")
	<h1>Products</h1>


	<nav>
	@foreach ($categories as $category)
		<li><a href="/product-list/{{$category->categoryid}}">{{$category->name}}</a></li>
	@endforeach
	</nav>

	<form method="post" action="/add-to-cart">
	@foreach($products as $product)
		<div class="product">
			{!! csrf_field() !!}
			<input type="number" name="count-{{$product->productid}}" value="1"> Count
			<input type="checkbox" name="product[]" value="{{$product->productid}}"> Add to cart
			<h2>{{$product->name}}</h2>
			<p>{{$product->description}}</p>
			<p>
				Price: {{formatPrice($product->price)}} <br/>
				Count: {{$product->count}}
			</p>
		</div>
	@endforeach

	<input type="submit" value="Add products to cart">
	</form>


	@foreach($cart as $cartItem)
		id: {{$cartItem["product"]->productid}} ; Name: {{$cartItem["product"]->name}} ; Amount: {{$cartItem["count"]}} <br/>
	@endforeach
@endsection