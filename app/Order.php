<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function product_order(){
        return $this->hasMany(ProductOrder::class,'order_id');
    }
}
