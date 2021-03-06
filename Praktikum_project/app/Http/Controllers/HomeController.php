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
        $products = Product::whereNull('deleted_at')->paginate(9);
        $categories = Categories::all();
        return view('welcome',['productimages' => $productimages,'categories' => $categories,'products' => $products]);
    }

    public function categories($id)
    {
        $productimages = ProductImage::all();
        $products = Product::whereNull('deleted_at')->where('category_id','=',$id)->paginate(9);
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

    public function markread($id) {
        $unred = Auth::user()->Notifications();
        
        $notif = $unred->find($id);
        // dd($notif);
        if(is_null($notif->read_at)){
            $notif->read_at = now();
            $notif->save();
        }
        $where = $notif->data['transaction_id'];
        return redirect('/transaksi/detail/'.$where);
    }
}
