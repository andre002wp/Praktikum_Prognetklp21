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
        $transaksi->proof_of_payment = $bukti_upload;
        $transaksi->save();

        return redirect('/home');

    }

    public function cancelTransaction(Transaction $transaksi)
    {
        //$transaksi = Transaction::find($request->id);
        //dd($request);
        $transaksi->status = 'canceled';
        $transaksi->update();
        return redirect()->back();
    }
}
