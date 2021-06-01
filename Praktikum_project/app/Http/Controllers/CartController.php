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
            }])->where('user_id', '=', $id)->get();
            //dd($id);
            return view('cart', ['cart'=>$cart]);
        }
    }

    public function purchase(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $cart = Cart::create([
            'user_id' => $user_id,
            'product_id' => $id,
            'qty' => $request->jumlah_pesanan,
        ]);
        return redirect('home')->with('add','Carts added');
        
    }

    public function destroy(Cart $data, Request $request)
    {
        if ($request->ajax()) {
            $data = Cart::find($request->id);
            echo 'Produk Dihapus Dari Keranjang';
            $data->delete();
        } else {
            $data->delete();
            return redirect()->back()->with('error', 'Produk Dihapus Dari Keranjang');
        }
    }
}
