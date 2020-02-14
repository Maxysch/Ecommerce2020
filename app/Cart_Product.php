<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_Product extends Model
{
    public $table = "cart_product";
    public $primaryKey = "id";
    public $guarded = [];
}
