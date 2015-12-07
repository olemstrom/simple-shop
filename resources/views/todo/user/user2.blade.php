@extends('todo.user.main')

@section('content')
	<div class="col-md-8 text-left">
		@forelse($products as $product)
			<div>
				<form action="/add-produc" method="post">
					<strong>Add to cart:</strong> <br/>
					<div class="col-md-6">
						<label for="count">Amount: </label> <input type="number" value="1" name="amount" id="amount">
					</div>
					<div class="col-md-6 text-center">
						 <input type="submit" value="Add to cart">
					</div>
				</form>
			</div>

			<h3>{{$product->name}}</h3>
			<p>{{$product->description}}</p>
			<p>
				<strong>In stock</strong>: {{$product->count}} <br/>
				<strong>Price per unit</strong>: {{formatPrice($product->price)}}
			</p>
		@empty
			<h1>No products in this category. Sad panda :<</h1>
			<img src="http://i.imgur.com/74B6GaH.gif" alt="Panda fail">
		@endforelse	
	</div>
@endsection