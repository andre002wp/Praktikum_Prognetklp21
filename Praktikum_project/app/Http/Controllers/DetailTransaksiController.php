<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\ProductReview;
use App\Admin;
use App\Notifications\NewReview;
use Illuminate\Support\Facades\Auth;

class DetailTransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index($id){
        $transaksi = Transaction::with(['user','transaction_detail' => function($trx){
            $trx>with(['product' => function($trxs){
                $trxs->with('product_image');
            }]);
        }, 'courier'])->find($id);
        $reviews = ProductReview::where('transaction_id','=',$transaksi->id)->get();
        // dd($transaksi->transaction_detail[0]->product->product_image->count());
        return view('detailTransaksi',['transaksi' => $transaksi,"reviews" => $reviews]);
    }

    public function uploadPayment(Request $request){
        $transaksi = Transaction::find($request->id);
        $bukti_upload = $request->file('proof');
        $image_name = $bukti_upload->getClientOriginalName();
        $bukti_upload->storePubliclyAs('livewire-tmp\buktipayment',  $image_name);
        $transaksi->proof_of_payment = $image_name;
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

    public function addrating(Request $request)
    {
        // dd($request);
        $user = Auth::user()->id;
        $review = ProductReview::create([
            'user_id' => $user,
            'transaction_id'=> $request->transaction_id,
            'rate'=> $request->star,
            'content'=> $request->content,
        ]);
        
        $allAdmins = Admin::all();
        foreach ($allAdmins as $it) {
            $it->notify(new NewReview($it->id));
        }

        $transaksi = Transaction::find($request->transaction_id);
        $transaksi->status = 'success';
        $transaksi->update();
        return redirect()->back();
    }
}
