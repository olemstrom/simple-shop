<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield("title")</title>
</head>
<body>
	
	<div>
		@if(count($cart) > 0)
		<table>
			<thead>
				<tr>
					<td>Name </td> 
					<td>Amount </td>
					<td>Price / unit</td>
					<td>Total</td>
				</tr>
			</thead>
			<tbody>
				@foreach($cart as $cartItem)
				<tr>
					<td>{{$cartItem["product"]->name}}</td>
					<td>{{$cartItem["count"]}}</td>
					<td>{{formatPrice($cartItem["product"]->price)}}</td>
					<td>{{formatPrice(totalPrice($cartItem))}}</td>
				</tr>
				@endforeach
				<tr>
					<td colspan="4">
						Total: {{formatPrice(cartTotal())}}	
					</td>
				</tr>
			</tbody>
		</table>

		<form action="/create-order" method="post">
			{!! csrf_field() !!}
			@foreach($cart as $cartItem)
				<input type="hidden" name="product[]" value="{{$cartItem['product']->productid}}">
				<input type="hidden" name="count[]" value="{{$cartItem['count']}}">
			@endforeach

			<label for="first_name">First name: </label> <input type="text" name="first_name" id="first_name"> <br/>
			<label for="last_name">Last name: </label> <input type="text" name="last_name" id="last_name"> <br/>
			<label for="email">Email: </label> <input type="email" name="email" id="email"> <br/>

			<label for="address">Address: </label> <input type="text" name="address" id="address"> <br/>
			<label for="city">City: </label> <input type="text" name="city" id="city"> <br/>
			<label for="zipcode">Zipcode: </label> <input type="text" name="zipcode" id="zipcode"> <br/>

			<input type="submit" value="Order!">
		</form>
		@else
		empty cart!
		@endif

	</div>

</body>
</html>