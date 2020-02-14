<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function carts(){
        return $this->belongsToMany('App\Cart','cart_product','product_id','cart_id');
    }
}
