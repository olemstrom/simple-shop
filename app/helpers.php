<?php 
use App\Cart;

function formatPrice($price) {
	return $price / 100;
}

function totalPrice($item) {
	return $item["count"] * $item["product"]->price;
}

function productsTotal($products) {
	$price = 0;
	foreach ($products as $product) {
		$price += $product->pivot->count * $product->price;
	}

	return $price;
}

function cartTotal() {
	$price = 0;
	foreach(Cart::all() as $cartItem) {
		$price += totalPrice($cartItem);
	}

	return $price;
}

function fullName($client) {
	return $client->firstname . " " . $client->lastname;
}

function activeClass($category) {
	$path = trim(Route::getCurrentRoute()->getPath());
	$isHome = $category == "home" && $path == "/";
	$isCategoryPage = $category != "home" && "/category/" . $category->name == $path;
	if($isHome || $isCategoryPage) return "active";
	else return "";
}