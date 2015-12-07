@forelse($cart as $cartItem)
<div class="cart-item">
	<strong>{{$cartItem["product"]["name"]}}</strong> 
	<span class="cart-item-price">
		{{formatPrice($cartItem["product"]["price"])}} x {{$cartItem["count"]}}
	</span>
	<form action="/remove-from-cart" method="post">
		{!! csrf_field() !!}
		<input type="hidden" name="productid" value="{{$cartItem['product']['productid']}}">
		<input type="submit" value="Remove"> 
	</form>
</div>
@empty
Empty cart!
@endforelse
@if(count($cart) > 0)
<a href="/checkout">Go to checkout</a>
@endif