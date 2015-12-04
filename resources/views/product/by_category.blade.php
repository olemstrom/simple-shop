@extends('todo.user.main')

@section('content')
	<div class="col-md-8 text-left">
		@forelse($products as $product)
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