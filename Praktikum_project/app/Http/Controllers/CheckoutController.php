<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Province as Provinsi;
use App\City;
use App\Courier as kurir;
use App\Product;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckoutController extends Controller
{
    public function index(Request $request){
        $provinces = Purchase::pluck('name', 'province_id');
        return response()->json($provinces);
    }
    
}
