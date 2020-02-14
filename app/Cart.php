<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function products(){
        return $this->belongsToMany('App\Product','cart_product','cart_id','product_id');
    }
}
