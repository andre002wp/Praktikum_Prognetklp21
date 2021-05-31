<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
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
    }
}
