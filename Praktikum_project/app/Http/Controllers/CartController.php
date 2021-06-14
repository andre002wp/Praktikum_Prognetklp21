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
            $trx->with('product_image');
            }])->where('user_id', '=', $id)->where('status', '=', "notyet")->get();
            // dd($cart[0]->qty);
            return view('cart', ['cart'=>$cart]);
    }

    public function updateqty(Request $request){
        $cart = Cart::where('user_id', Auth::user()->id)
        ->where('id', $request['product_id'])
        ->where('status', 'notyet')->first();
            // Sudah ada, tambahkan qty
        $product = Product::find($cart->product_id);
        if($request['action'] == "plus"){
            if($product->stock > $cart->qty){
                $cart->qty = $cart->qty + 1;
                $cart->save();
            }
        }
        elseif($request['action'] == "minus"){
            if ($cart->qty>1) {
                $cart->qty = $cart->qty - 1;
                $cart->save();
            }
        }
        
        return ($cart);
    }

    public function purchase(Request $request, $id)
    {
        $validated = $request->validate([
            'jumlah_pesanan' => 'required',
        ]);

        $product = Product::find($id);
        if($request->jumlah_pesanan > $product->stock){
            $jumlah_item = $product->stock;
        }
        else{
            $jumlah_item = $request->jumlah_pesanan;
        }
        
        $user = Auth::user()->id;
        $cart = Cart::create([
            'user_id' => $user,
            'product_id' => $id,
            'qty' => $jumlah_item,
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
