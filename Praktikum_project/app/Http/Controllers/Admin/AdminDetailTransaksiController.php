<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminDetailTransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }
    
    public function index($id){
        $transaksi = Transaction::with(['user','transaction_detail' => function($trx){
            $trx>with(['product' => function($trxs){
                $trxs->with('relasi_product_image');
            }]);
        }, 'courier'])->find($id);

        //$review = Product_Review::where('user_id', '=', $transak
        
        return view('admin.transaksi.detailTransaksi',['transaksi' => $transaksi]);
     
    }
}
