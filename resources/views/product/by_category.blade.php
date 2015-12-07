@extends('todo.user.main')

@section('content')
	<div class="col-md-8 text-left">

		@forelse($products as $product)
			<div class="border-bottom">
				<form action="/add-to-cart" method="post">
					{!! csrf_field() !!}
					<input type="hidden" name="product" value="{{$product->productid}}">
					<div class="clearfix row">
						<div class="col-md-12">
						 	<strong>Add to cart:</strong>
						 </div> 
						<div class="col-md-6">
							<label for="count">Amount: </label> 
							<input type="number" value="1" name="count" id="amount"> <br/>
							<input type="submit" value="Add to cart">
						</div>
					</div>
				</form>
				
				<h3>{{$product->name}}</h3>
				<p>{{$product->description}}</p>
				<p>
					<strong>In stock</strong>: {{$product->count}} <br/>
					<strong>Price per unit</strong>: {{formatPrice($product->price)}}
				</p>
			</div>
		@empty
			<h1>No products in this category. Sad panda :<</h1>
			<img src="http://i.imgur.com/74B6GaH.gif" alt="Panda fail">
		@endforelse	
	</div>
@endsection