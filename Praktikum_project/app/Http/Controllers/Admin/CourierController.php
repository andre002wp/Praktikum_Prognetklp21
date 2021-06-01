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
        $couriers = Courier::whereNull('deleted_at')->get();
        $this->courier = $couriers;
        return view ('admin.courier.index',compact(['couriers']));
    }

    public function add()
    {
        return view ('admin.courier.add');
    }

    public function store(Request $request) //method untuk input data ke database
    {
        
        $courier = Courier::create([
            'courier' => $request->courier,
            'slug' => Str::slug($this->courier)
        ]);
        return redirect('admin/courier')->with('add','Data Berhasil ditambahkan');
    }

    public function edit($id) //method untuk menampilkan halaman edit
    {
        $courier = Courier::find($id);
        return view('admin.courier.edit',compact('courier')); 
    }

    public function update(Request $request, $id) //method untuk mengupdate data di database
    {
        $courier = Courier::find($id);
        $courier->courier = $request->courier;
        $courier->save();
        return redirect('admin/courier')->with('edits','Data Berhasil dirubah');
    }

    public function delete($id)
    {
        $courier = Courier::find($id);
        $courier->deleted_at = now();
        $courier->save();
        return redirect('admin/courier')->with('edits','Data Berhasil dihapus');
    }
}
