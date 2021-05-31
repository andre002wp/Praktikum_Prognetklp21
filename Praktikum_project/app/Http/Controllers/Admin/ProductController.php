<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;

class ProductController extends Controller
{
    public function index()
    {
        return view ('admin.product.index');
    }

    public function add()
    {
        return view ('admin.product.add');
    }

    public function edit($id)
    {
        return view ('admin.product.edit',[
            'products' => Product::find($id),
        ]);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->deleted_at = now();
        $product->save();
        return redirect('admin/product')->with('edits','Data Berhasil dihapus');
    }


    public function getimage($id){
        $image = ProductImage::where('product_id', $id)->get();
        $path =  url('storage/livewire-tmp/images/'.$image->image_name);
        return $path;
    }
    
}
