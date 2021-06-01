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

    public function update(Request $request, $id) //method untuk mengupdate data di database
    {
        $request->validate([
            'product_name' => 'required|min:6',
        ]);

        // $img = $this->storeImage();
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        if ($request->price != null) {
            $product->price = $request->price;
        }
        if ($request->description != null) {
            $product->description = $request->description;
        }
        if ($request->product_rate != null) {
            $product->product_rate = $request->product_rate;
        }
        if ($request->stock != null) {
            $product->stock = $request->stock;
        }
        if ($request->weight != null) {
            $product->weight = $request->weight;
        }
        $product->save();
        // $this->product_id = DB::table('products')->max('id');
        // $image_name = $this->image->getClientOriginalName();
        // $this->image->storePubliclyAs('public\livewire-tmp\product',  $image_name);
        // $product_image = ProductImage::create([
        //     'product_id' => $this->product_id,
        //     'image_name' => $image_name,
        //     'slug' => str::slug($this->product_name)
        // ]);
        return redirect('admin/product')->with('add','Product berhasil diubah');
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
