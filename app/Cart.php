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

	public static function clear() {
		session()->put("cart", []);
	}

	public static function remove($id) {
		$cart = Cart::getCart();
		var_dump($id);
		unset($cart[$id]);
		session()->put("cart", $cart);
	}

 	private static function getCart() {
    	$cart = session()->get("cart");

    	if(is_null($cart)) return [];
    	else return $cart;
    }
}