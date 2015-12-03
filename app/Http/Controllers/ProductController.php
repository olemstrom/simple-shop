<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function getProductList(Request $request) {
        return view('product.products', [
        	"products" => Product::all(),
        	"categories" => Category::all(),
        	"cart" => Cart::all()
    	]);
    }

    public function addProductToCart(Request $request) {
    	
    	$products = $request->product;
    	foreach($products as $id) {
    		$count = $request["count-".$id];
    		Cart::add($id, $count);
    	}

    	return redirect("/product-list");

    }

    private function getProducts($productids) {
    	$products = [];
    	foreach($productids as $index => $id) {
    		$product = Product::find($id);
    		$products[$index] = $product;
    	}

    	return $products;
    }

}