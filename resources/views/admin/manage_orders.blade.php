@extends("admin.admin_main")
@section("title", "Admin view - Manage orders")
@section("content")
	<p>Manage orders</p>

	<form method="post" action="/admin/delete-orders">
		{!! csrf_field() !!}
		
		@forelse($orders as $order)
			<div class="order">
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
		No products sorge :<
		@endforelse

		<input type="submit" value="Delete orders"/>	
	</form>
	
@endsection