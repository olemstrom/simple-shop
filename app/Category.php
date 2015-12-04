<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $primaryKey = "categoryid";
    public $timestamps = false;

    protected $fillable = array('name', "navitem", "displayname");


    public function products()
    {
        return $this->belongsToMany('App\Product', "in_category", "categoryid", "productid");
    }

    public function ids()
    {
        return $this->belongsToMany('App\Product', "in_category", "categoryid", "productid")->select(array("categoryid"));
    }
}
