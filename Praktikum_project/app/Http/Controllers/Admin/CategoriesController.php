<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::whereNull('deleted_at')->get();
        return view ('admin.categories.index',compact(['categories']));
    }

    public function add()
    {
        return view ('admin.categories.add');
    }

    public function store(Request $request)
    {
        // dd($request);
        $courier = Categories::create([
            'category_name' => $request->category_name,
        ]);
        return redirect('admin/categories')->with('create','Data Berhasil dirubah');
    }

    public function edit($id) //method untuk menampilkan halaman edit
    {
        $categories = Categories::find($id)->first();
        // dd($categories);
        return view('admin.categories.edit',compact('categories')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => ['required', 'max:30']
        ]);
        $category = new Categories();
        $category = Categories::find($id);
        $category->category_name= $request->category_name;
        $category->save();
        return redirect('/categories')->with('edits','Data Berhasil dirubah');
       
    }

    public function delete($id)
    {
        $category = Categories::find($id);
        $category->deleted_at = now();
        $category->save();
        return redirect('admin/categories')->with('delete','Data Barang Berhasil Dihapus');
    }
}
