<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductImage;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(){
        if(is_null(Auth::user())){
            return redirect('/login');
        }else{
            $id = Auth::user()->id;
            $cart = Cart::with(['product' => function($q){
                $q->with('product_image',);
            }])->where('user_id', '=', $id)->where('status', '=', 'notyet')->get();

            return view('cart', ['cart'=>$cart]);
        }
    }
}
