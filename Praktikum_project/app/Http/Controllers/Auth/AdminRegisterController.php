<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showRegistrationForm()
    {
        return view('auth.admin-register');
    }

    public function register(Request $request)
    {
        // memvalidasi form
        $this->validate($request,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
                'phone' => ['required', 'string', 'max:15'],
                'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:8',
            ]    
        ); 

        //dd($request);

        // proses data apabila sudah diinput
        if ($request->phone) {
            // mengambil nomor handphone telah diinput
            $handphone = $request->phone;

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
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
    
            Auth::guard('admin')->loginUsingId($admin->id);
                return redirect()->route('admin.dashboard');
                    
        } catch (\Exception $e) {
            return redirect()->back()->withInput($request->only('name', 'email'));
        }                  
    }
}