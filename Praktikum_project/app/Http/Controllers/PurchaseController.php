<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
Use Auth;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        // $product = Product::where('id', $id)->first();
        $product = Product::with('product_image')->where('id', $id)->first();
        // dd($product->product_image[0]->image_name);
        return view('purchase.index', compact('product'));
    }
}
