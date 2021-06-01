<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $transaksi = Transaction::all();
        return view('transaksi', ['transaksi' => $transaksi]);
    }
}
