<?php 
use App\Cart;

function formatPrice($price) {
	return $price / 100;
}

function totalPrice($item) {
	return $item["count"] * $item["product"]->price;
}

function cartTotal() {
	$price = 0;
	foreach(Cart::all() as $cartItem) {
		$price += totalPrice($cartItem);
	}

	return $price;
}