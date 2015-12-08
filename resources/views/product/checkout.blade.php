@extends('main')

@section('content')
	@if(count($cart) > 0)
	<table class="table table-bordered ">
		<thead>
			<tr>
				<th>Name</th>
				<th>Amount</th>
				<th>á Price €</th>
				<th>Unit Total €</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cart as $c)
				<tr>
					<td>{{$c['product']->name}}</td>
					<td>{{$c['count']}}</td>
					<td>{{formatPrice($c['product']->price)}}</td>
					<td>{{formatPrice($c['count']*$c['product']->price)}}</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4" class="success text-right">Total: {{formatPrice(cartTotal())}} €</td>
			</tr>
		</tfoot>
	</table>
	<div>
		<form role="form" action="/create-order" method="post">
			{!! csrf_field() !!}
			@foreach($cart as $cartItem)
				<input type="hidden" name="product[]" value="{{$cartItem['product']->productid}}">
				<input type="hidden" name="count[]" value="{{$cartItem['count']}}">
			@endforeach
			<div class="form-group">
		  		<label for="firstName">First name</label>
		    	<input type="text" class="form-control" name="first_name" id="first_name">
		  	</div>
		  	<div class="form-group">
		  		<label for="lastName">Last name</label>
		    	<input type="text" class="form-control" name="last_name" id="last_name">
		  	</div>
		  	<div class="form-group">
		  		<label for="email">Email</label>
		    	<input type="email" class="form-control" name="email" id="email">
		  	</div>
		  	<div class="form-group">
		  		<label for="address">Address</label>
		    	<input type="text" class="form-control" name="address" id="address">
		  	</div>
		  	<div class="form-group">
		  		<label for="city">City</label>
		    	<input type="text" class="form-control" name="city" id="city">
		  	</div>
		  	<div class="form-group">
		  		<label for="zipcode">Zipcode</label>
		    	<input type="text" class="form-control" name="zipcode" id="zipcode">
		  	</div>
		  	<div>
				<input type="submit" class="btn btn-success" value="Order"></input>
			</div>
		</form>
	</div>
	@else
	<strong>empty cart!</strong>
	@endif
@endsection