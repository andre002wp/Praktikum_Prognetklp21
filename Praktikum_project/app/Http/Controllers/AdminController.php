<?php

namespace App\Http\Controllers;
use App\Product;
use App\Transaction;
use App\Courier;
use App\Categories;
use App\Discount;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $transactions = Transaction::all();
        $products = Product::all();
        $courier = Courier::all();
        $categories = Categories::all();
        $discounts = Discount::all();

        $trans_by_year = Transaction::all()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('y');
            });

        $trans_by_month_year = Transaction::all()
            ->groupBy(function ($val) {
                // return Carbon::parse($val->created_at)->format('m');
                return '20' . Carbon::parse($val->created_at)->format('y') . ' ' . Carbon::parse($val->created_at)->format('m');
            });
        $trans_graph_label = [];
        $trans_graph_count = [];
        foreach ($trans_by_month_year->keys()->sort() as $it) {
            array_push($trans_graph_label, $it);
            array_push($trans_graph_count, count($trans_by_month_year[$it]));
        }

        $trans_by_month_year_success = Transaction::whereIn('status', ['success', 'delivered'])
            ->get()
            ->groupBy(function ($val) {
                // return Carbon::parse($val->created_at)->format('m');
                return '20' . Carbon::parse($val->created_at)->format('y') . ' ' . Carbon::parse($val->created_at)->format('m');
            });
        $trans_graph_label_success = [];
        $trans_graph_count_success = [];
        foreach ($trans_by_month_year_success->keys()->sort() as $it) {
            array_push($trans_graph_label_success, $it);
            array_push($trans_graph_count_success, count($trans_by_month_year_success[$it]));
        }

        $trans_by_month_year_failed = Transaction::whereIn('status', ['expired', 'canceled'])
            ->get()
            ->groupBy(function ($val) {
                // return Carbon::parse($val->created_at)->format('m');
                return '20' . Carbon::parse($val->created_at)->format('y') . ' ' . Carbon::parse($val->created_at)->format('m');
            });
        // dd($trans_by_month_year_failed);
        $trans_graph_label_failed = [];
        $trans_graph_count_failed = [];
        foreach ($trans_by_month_year_failed->keys()->sort() as $it) {
            array_push($trans_graph_label_failed, $it);
            array_push($trans_graph_count_failed, count($trans_by_month_year_failed[$it]));
        }
        

        $trans_graph_label = json_encode($trans_graph_label);
        $trans_graph_count = json_encode($trans_graph_count);
        $trans_graph_label_success = json_encode($trans_graph_label_success);
        $trans_graph_count_success = json_encode($trans_graph_count_success);
        $trans_graph_label_failed = json_encode($trans_graph_label_failed);
        $trans_graph_count_failed = json_encode($trans_graph_count_failed);
        return view('admin.page.dashboard', compact('trans_graph_label_success', 'trans_graph_count_success', 'trans_graph_label_failed', 'trans_graph_count_failed', 'trans_graph_label', 'trans_graph_count', 'trans_by_year', 'trans_by_month_year', 'transactions', 'products', 'courier', 'categories', 'discounts'));
    }

    public function notif() {
        return view('admin.page.notif');
    }

    public function marknotif() {
        $notif_unread = Auth::user()->unreadNotifications;
        foreach($notif_unread as $notif){
            $notif->read_at = now();
            $notif->save();
        }
        return redirect('/admin');
    }
}
