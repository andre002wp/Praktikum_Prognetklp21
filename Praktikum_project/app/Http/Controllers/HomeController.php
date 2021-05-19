<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

    public function marknotif(){
        $user = User::find(Auth::user()->id);
        $user->unreadNotifications()->update(['read_at' => now()]);
        return redirect()->back();
    }
}
