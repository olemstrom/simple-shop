@extends("admin.main")
@section("title", "Admin view - Manage orders")
@section("content")
	<h1>Manage orders</h1>

	<form method="post" action="/admin/delete-orders">
		{!! csrf_field() !!}
		
		@forelse($orders as $order)
			<div class="order border-bottom">
				<input type="checkbox" name="order[]" value="{{$order->orderid}}">
				<h3>#{{$order->orderid}}</h3>
				<p><strong>Client:</strong> <br/>
				{{fullName($order->client)}} <br/>
				{{$order->client->email}}
				</p>

				<p>
					<strong>Order:</strong><br/>
					@foreach($order->products as $product)
						{{$product->name}} | {{formatPrice($product->price)}} x {{$product->pivot->count}} <br/>
					@endforeach
					<strong>Total: </strong> {{formatPrice(productsTotal($order->products))}}
				</p>
			</div>
		@empty
		No orders sorge :<
		@endforelse

		<input type="submit" value="Delete orders"/>	
	</form>
	
@endsection