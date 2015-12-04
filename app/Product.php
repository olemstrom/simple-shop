<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $primaryKey = "productid";
    public $timestamps = false;
    protected $fillable = array('name', 'description', 'count', 'price');

    public function categories()
    {
        return $this->belongsToMany('App\Category', "in_category", "productid", "categoryid");
    }

    public function attachCategories($categories) {

    	foreach($categories as $categoryId) {
            $this->categories()->attach(Category::find($categoryId));
        }
    }

    public function updateCategories($categoryIds) {
    	$this->categories()->sync($categoryIds);

    }

    public function hasCategory($categoryid) {
    	return $this->categories->contains($categoryid);
    }

    public function orders() {
        return $this->belongsToMany("App\Order", "in_category", "productid", "orderid");
    }
}
