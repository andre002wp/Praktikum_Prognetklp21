<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductImage;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $productimages = ProductImage::all();
        $products = Product::whereNull('deleted_at')->paginate(12);
        $categories = Categories::all();
        return view('welcome',['productimages' => $productimages,'categories' => $categories,'products' => $products]);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

    public function notif() {
        return view('/notif');
    }

    public function marknotif() {
        $notif_unread = Auth::user()->unreadNotifications;
        foreach($notif_unread as $notif){
            $notif->read_at = now();
            $notif->save();
        }
        return redirect('/home');
    }
}
