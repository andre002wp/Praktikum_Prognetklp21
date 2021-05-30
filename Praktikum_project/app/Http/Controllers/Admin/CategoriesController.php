<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view ('admin.categories.index',compact(['categories']));
    }

    public function add()
    {
        return view ('admin.categories.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => ['required','min:4']

        ]);
        
        $ct = new Categories;
        $ct->category_name = $request->category_name;
        $ct->save();
        return redirect('/categories')->with('success','Data Tersimpan');
    }

    public function edit(Categories $categories) //method untuk menampilkan halaman edit
    {
        $categories = Categories::find($categories)->first();
        return view('admin.categories.edit',compact('categories')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => ['required', 'max:30']
        ]);
        $category = new Product_Categories();
        $category = Product_Categories::find($id);
        $category->category_name= $request->category_name;
        $category->save();
        return redirect('/categories')->with('edits','Data Berhasil dirubah');
       
    }

    public function delete($id)
    {
        $cat = Product_Categories::find($id);
        $product_cat_det = DB::table('product_category_details')->where('product_id','=',$cat->id)->get();
        if($product_cat_det->isEmpty()){
            DB::delete('delete from product_category_details where product_id = ?', [$cat->id]);
        }
        $cat->delete();

        return redirect('/categories')->with('delete','Data Barang Berhasil Dihapus');
    }
}
