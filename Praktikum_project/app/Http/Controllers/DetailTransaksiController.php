<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class DetailTransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index($id){
        $transaksi = Transaction::with(['user','transaction_detail' => function($trx){
            $trx>with(['product' => function($trxs){
                $trxs->with('relasi_product_image');
            }]);
        }, 'courier'])->find($id);
        
        return view('detailTransaksi',['transaksi' => $transaksi]);
    }

    public function uploadPayment(Request $request){
        $transaksi = Transaction::find($request->id);
            //dd($request);
        $bukti_upload = $request->file('file');
        $path = 'proof_payment';
        $nama_file = $bukti_upload->getClientOriginalName();
        $bukti_upload->move($path, $nama_file);

        $transaksi->proof_of_payment = $nama_file;
        $transaksi->save();

        return view('welcome');

    }
}
