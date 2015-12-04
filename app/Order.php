<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "productorder";
    protected $primaryKey = "orderid";
    public $timestamps = false;

    public function client() {
    	return $this->belongsTo("App\Client", "clientid", "email");
    }

    public function products() {
    	return $this->belongsToMany("App\Product", "in_order", "orderid", "productid")->withPivot("count");
    }
}
