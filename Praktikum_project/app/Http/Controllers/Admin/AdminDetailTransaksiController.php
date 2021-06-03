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
        
        return view('admin.transaksi.detailTransaksi',['transaksi' => $transaksi]);
    }

    public function updateStatus(Request $request){
        $transaksi = Transaction::with('transaction_detail')->find($request->id);
        $user = User::find($transaksi->user_id);
        if($request->status == 1){
            $transaksi->status = 'canceled';
            $transaksi->save();
            return redirect('/transaksi/detail/'.$request->id);
        
        }elseif($request->status == 2){
            $transaksi->status = 'success';
            $transaksi->save();
            return redirect('/transaksi/detail/'.$request->id);

        }elseif($request->status == 3){
            $transaksi->status = 'verified';
            $transaksi->save();

            foreach($transaksi->transaction_details as $data){
                $produk = Product::find($data->product_id);
                $produk->stock = $produk->stock - $data->qty;
                $produk->save();
            }
            return redirect('admin/transaksi/detail/'.$request->id);
            
        }else{
            $transaksi->status = 'delivered';
            $transaksi->save();
            return redirect('admin/transaksi/detail/'.$request->id);
        }
    }
}
