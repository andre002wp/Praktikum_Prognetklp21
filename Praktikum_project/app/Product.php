<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['id','product_name', 'price', 'description', 'product_rate', 'stock', 'weight'];

    public function product_image(){
        return $this->hasMany('App\Product_image','product_id','id');
    }

    public function product_review(){
        return $this->hasMany('App\ProductReview','product_id','id');
    }

    public function discount(){
        return $this->hasMany('App\Discount', 'id_product', 'id');
    }
}

