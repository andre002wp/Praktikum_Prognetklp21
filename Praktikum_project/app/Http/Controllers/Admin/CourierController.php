<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Courier;
use Illuminate\Support\Str;


class CourierController extends Controller
{
    public $courier;

    public function index() //method menampilkan halaman utama
    {
        $couriers = Courier::all();
        return view ('admin.courier.index',compact(['couriers']));
    }

    public function add()
    {
        return view ('admin.courier.add');
    }
    
    public function store(Request $request) //method untuk input data ke database
    {
        $request->validate([
            'courier' => ['required','min:2']

        ]);

        $cr = new Courier;
        $cr->courier = $request->courier;
        $cr->save();
        return redirect('/courier')->with('success','Data Tersimpan');
    }

    public function edit(Courier $courier) //method untuk menampilkan halaman edit
    {
        $courier = Courier::find($courier)->first();
        return view('admin.courier.edit',compact('courier')); 
    }

    public function update(Request $request, Courier $courier) //method untuk mengupdate data di database
    {
        $courier->courier = $request->courier;
        $courier->save();
        return redirect('admin.courier')->with('edits','Data Berhasil dirubah');
    }

    public function delete($id)
    {
        $courier = Courier::find($id);
        $courier->delete_at = now();
        $courier->save();
        return view ('admin.courier.index');
    }
}
