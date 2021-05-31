<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'userLogout');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function login(Request $request)
    {
        // untuk validasi formnya
        $this->validate($request,
            [
                'email' => 'required|string|email',
                'password' => 'required|string|min:8',
                'g-recaptcha-response' => 'required|captcha',
            ]
        );

        //login sebagai user
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // kalo sukses, redirect ke user dashboard
            return redirect()->intended(route('home'));
        }

        // kalau tidak berhasil, redirect ke login page
        return redirect()->back()->withInput($request->only('email', 'remember')); 
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
