<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\Cart;
use App\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct() {
        view()->share('cart', Cart::all());
    }

    public function getCheckout() {
        return view("checkout");
    }

    public function createOrder(Request $request) {
    	$this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'zipcode' => 'required|max:5'
        ]);


        $order = new Order();
        $client = $this->getClient($request->email);
        $client->firstname = $request->first_name;
        $client->lastname  = $request->last_name;
        $client->save();

        $order->address = $request->address;
        $order->city = $request->city;
        $order->zipcode = $request->zipcode;
        $order->clientid = $client->email;

        $order->save();

        foreach($request->product as $index => $productid) {
        	$count = $request->count[$index];

        	$order->products()->attach($productid, ["count" => $count]);
        	$p = Product::find($productid);
        	$p->count -= $count;
        	$p->save();
        }

        Cart::clear();        

        return redirect("/");
    }

    public function sanitize(){
        $sanitized = [];
        foreach($this->all() as $key => $value) {
            $sanitized[$key] = htmlspecialchars($value);
        }

        return $sanitized;
    }

    private function getClient($email) {
    	$c = Client::find($email);

    	if(is_null($c)) {
    		$c = new Client();
    		$c->email = $email;
    	}

    	return $c;
    }

}