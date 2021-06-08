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
       $id = Auth::user()->id;
        $cart = Cart::with(['product' => function($trx){
            $trx->with('product_image',);
            }])->where('user_id', '=', $id)->where('status', '=', "notyet")->get();
            // dd($cart);
            return view('cart', ['cart'=>$cart]);
    }

    public function purchase(Request $request, $id)
    {
        $validated = $request->validate([
            'jumlah_pesanan' => 'required',
        ]);
        $user = Auth::user()->id;
        $cart = Cart::create([
            'user_id' => $user,
            'product_id' => $id,
            'qty' => $request->jumlah_pesanan,
        ]);
        return redirect('home'); 
    }

    public function destroy($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();   
    }
}
