<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class cart extends Controller
{
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
