<?php

namespace App\Http\Controllers\Admin;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function index(){
        $transaksi = Transaction::all();
        return view('admin.transaksi.transaksi', ['transaksi' => $transaksi]);
    }
}
