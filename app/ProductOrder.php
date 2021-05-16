<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $guarded = [];

    public function get_product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
