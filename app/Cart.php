<?php
namespace App;
use App\Product;

class Cart {
	public static function add($productid, $count) {
		$cart = self::getCart();
		$product = Product::find($productid);
		if(is_null($product)) return;

		if(isset($cart[$productid])) {
			$count += $cart[$productid]["count"];
		}

		$cart[$productid] = [
			"product" => $product,
			"count" => $count 
		];

		session()->put("cart", $cart);
	}

	public static function all() {
		return self::getCart();
	}

	private static function getCart() {
    	$cart = session()->get("cart");

    	if(is_null($cart)) return [];
    	else return $cart;
    }
}