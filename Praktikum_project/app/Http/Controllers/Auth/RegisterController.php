<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    protected function register(Request $data)
    {
        $this->validate($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15'],
            'address' => ['required', 'string', 'max:255'],
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        //dd($data);

           // proses data apabila sudah diinput
        if ($data->phone) {
            // mengambil nomor handphone telah diinput
            $handphone = $data->phone;
            // validasi inputan nomor handphone
            if (!preg_match("/^[0-9|(\+|)]*$/", $handphone) OR strlen(strpos($handphone, "+", 1)) > 0) {
                return redirect()->back()->with('error','Handphone hanya boleh menggunakan angka dan diawali simbol +');
            }
            else if (substr($handphone, 0, 3) != "+62" OR "0") {
                return redirect()->back()->with('error','Handphone harus diawali dengan kode negara +62');
            }
            else if (substr($handphone, 3, 1) == "0" ) {
                return redirect()->back()->with('error','Handphone tidak boleh diikuti dengan angka 0 setelah kode negara');
            } 
        } 

        try {
            $user = User::create([
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'address' => $data->address,
                'password' => Hash::make($data->password),
            ]);

            Auth::guard('web')->loginUsingId($user->id);
                return redirect()->route('home');
                    
        } catch (\Exception $e) {
            return redirect()->back()->withInput($data->only('name', 'email'));
        }
    }
}