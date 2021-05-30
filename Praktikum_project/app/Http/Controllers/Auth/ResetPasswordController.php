<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use App\Http\Controllers\Auth\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;


     /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */

       /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected $redirectTo = '/home';

    protected function guard()
    {
        return Auth::guard('web');
    }

    protected function broker()
    {
        return Password::broker('users');
    }

    public function reset(Request $request)
    {
        //$user = \Auth::user();
        Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, \Auth::user()->password);
        });

        // untuk validasi formnya
        $this->validate($request, 
            [
                'email' => 'required|string|email',
                'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:8',
                'g-recaptcha-response' => 'required|captcha',
            ]
        );

         // jika validasinya salah
         if (!empty($request->input('captcha'))) {
            
            return redirect()->back();
            
        } else {
             $user = User::where('email', $request->email)->first();
             $user->password = bcrypt($request->password);
             $user->save();
  
             return redirect()->route('home');
        }
    }
}