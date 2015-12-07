<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;

class ProductController extends Controller
{
    
    public function __construct() {
        view()->share('cart', Cart::all());
    }

    public function getProductList(Request $request) {
        return view('product.products', [
        	"products" => Product::all(),
        	"categories" => Category::all()
    	]);
    }

    public function getProductsByCategory($categoryname) {
        return view('product.by_category', [
            "products" => Category::where('name', $categoryname)->first()->products,
            "cart" => Cart::all()
        ]);
    }

    public function addProductToCart(Request $request) {
    	
    	$productid = $request->product;
    	$count = $request->count;

        Cart::add($productid, $count);

    	return Redirect::back();

    }

    public function removeProductFromCart(Request $request) {
        
        $productid = $request->productid;
        var_dump($productid);
        Cart::remove($productid);

        return Redirect::back();

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