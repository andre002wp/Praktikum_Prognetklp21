<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Cart;
use App\Province;
use App\City;
use App\Courier as Kurir;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\Transaction_Detail;
use App\Notifications\NewTransaction;

class CheckoutController extends Controller
{
    public function index(){
        
        $user_id = Auth::User()->id;
        $cart = Cart::with(['product' => function($q){
            $q->with('product_image');
        }])->where('user_id', '=', $user_id)->where('status', '=', 'notyet')->get();
        
        $subtotal = 0;
        foreach($cart as $item){
            $subtotal = $subtotal + ($item->product->price * $item->qty);
        }

        $weight = 0;
        foreach($cart as $item){
            $weight = $weight + ($item->product->weight * $item->qty);
        }
        
        $provinsi = Province::all();
        $kurir = Kurir::all();
        // dd($cart[0]);
        
        return view('checkout',[
            'cart'=>$cart,
            'subtotal'=>$subtotal,
            'provinsi' => $provinsi,
            'kurir' => $kurir,
            'weight'=>$weight,]);
    }

    public function getCities($id){
        $city = City::where('province_id','=',$id)->pluck('title','city_id');
        return json_encode($city);
    }

    public function submit(Request $request){
        dd($request);
        $provinsi = Province::find($request->province);
        $kota = City::where('city_id','=',$request->regency)->first();
        $courier = Kurir::where('courier','=',$request->courier)->first();
        $transaksi = new Transaction;
        date_default_timezone_set("Asia/Makassar");
        $transaksi->timeout = date('Y-m-d H:i:s', strtotime('+1 days'));
        $transaksi->address = $request->address;
        $transaksi->regency = $kota->name;
        $transaksi->province = $provinsi->name;
        $transaksi->total = $request->total;
        $transaksi->shipping_cost = $request->shipping_cost;
        $transaksi->sub_total = $request->sub_total;
        $transaksi->user_id = $request->user_id;
        $transaksi->courier_id = $courier->id;
        $transaksi->status = 'unverified';
        $transaksi->save();

        $allAdmins = Admin::all();
        foreach ($allAdmins as $it) {
            $it->notify(new NewTransaction($transaksi->id));
        }

        if($request->product_id != 0){
            $detail_transaksi = new Transaction_Detail;
            $detail_transaksi->transaction_id = $transaksi->id;
            $detail_transaksi->product_id = $request->product_id;
            $detail_transaksi->qty = $request->qty;
            $produk = Product::with('discount')->find($request->product_id);
            if($produk->discount->count()){
                foreach($produk->discount as $diskon){
                    if($diskon->end > date('Y-m-d')){
                        $detail_transaksi->discount = $diskon->percentage;
                    }else{
                        $detail_transaksi->discount = 0;
                    }
                }
            }else{
                $detail_transaksi->discount = 0;
            }
            $detail_transaksi->selling_price = $produk->price;
            $detail_transaksi->save();
        }
        else{
            $cart = Cart::with(['product' => function($q){
                $q->with('product_image','discount');
            }])->where('user_id', '=', $request->user_id)->where('status', '=', 'notyet')->get();
    
            foreach($cart as $item){
                $item = new Transaction_Detail;
                $item->transaction_id = $transaksi->id;
                $item->product_id = $request->product_id;
                $item->qty = $request->qty;
                $produk = Product::with('discount')->find($request->product_id);
                if($produk->discount->count()){
                    foreach($produk->discount as $diskon){
                        if($diskon->end > date('Y-m-d')){
                            $item->discount = $diskon->percentage;
                        }else{
                            $item->discount = 0;
                        }
                    }
                }else{
                    $item->discount = 0;
                }
                $item->selling_price = $produk->price;
                $item->save();
            }
        }

        $cart = Cart::where('user_id', '=', $request->user_id)->where('status', '=', 'notyet')->get();
        foreach($cart as $cart_done){
            $cart_done->status = "checkedout";
            $cart_done->save();
        }
        
        return redirect('/transaksi/detail/'.$transaksi->id);
    }
}