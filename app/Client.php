<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "client";
    protected $primaryKey = "email";
    public $timestamps = false;
}
