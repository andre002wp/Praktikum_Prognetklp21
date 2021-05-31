<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transaction;
Use Auth;
Use Carbon\Carbon;
class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $product = Product::where('id', $id)->first();
        return view('purchase.index', compact('product'));
    }

    public function purchase(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        //simpan ke db transaksi
        $transaksi = new Transaksi;
        $transaksi->timeout = date('Y-m-d H:i:s', strtotime('+1 days'));
        $transaksi->address = $request->address;
        $transaksi->regency = $kota->title;
        $transaksi->province = $provinsi->title;
        $transaksi->total = $request->total;
        $transaksi->shipping_cost = $request->shipping_cost;
        $transaksi->sub_total = $request->sub_total;
        $transaksi->user_id = Auth::user()->id;
        $transaksi->courier_id = $request->courier;
        $transaksi->status = 'unverified';
        $transaksi->save();

        //simpan ke db pesanan detail
        $new_transaksi = Transaksi::where('user_id', Auth::user()->id)->where('status', unverified)->first();

        $detail_transaksi = new DetailTransaksi;
        $detail_transaksi->

    }
}
