<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class cart extends Controller
{
    use HasFactory;
    protected $table = 'cart';
    protected $guarded = [];

    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function add($id)
    {
        $product = Product::where('id', $id)->first();
        return view ('admin.product.buyproduct',$product);
    }

    public function cart($id)
    {
        $product = ProductImage::where('id', $id)->first();

        return view ('admin.product.viewproduct');
    }

    
}
