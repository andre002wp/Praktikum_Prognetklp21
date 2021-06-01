<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
    protected $table = 'carts';
    protected $guarded = [];

    protected $fillable = ['id','user_id','product_id','qty','created_at','updated_at','status'];

    public function product(){
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
