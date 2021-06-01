<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Product;
use App\ProductImage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    use WithFileUploads;

    public $product_name;
    public $image;
    public $price;
    public $description;
    public $stock;
    public $weight;
    public $product_id; 

    public function submit()
    {
        $this->validate([
            'product_name' => 'required|min:6',
            'image' => 'image|required',
        ]);

        // $img = $this->storeImage();

        $product = Product::create([
            'product_name' => $this->product_name,
            'price' => $this->price,
            'description' => $this->description,
            'product_rate' => 0,
            'stock' => $this->stock,
            'weight' => $this->weight,
            'slug' => str::slug($this->product_name)
        ]);

        $this->product_id = DB::table('products')->max('id');
        $image_name = $this->image->getClientOriginalName();
        $this->image->storeas('livewire-tmp/product',  $image_name);
        $product_image = ProductImage::create([
            'product_id' => $this->product_id,
            'image_name' => $image_name,
            'slug' => str::slug($this->product_name)
        ]);
        dd($product_image);
        // $this->deleteInput();

        session()->flash('message', 'Product berhasil ditambahkan');
        
    }

    //berfungsi buat ngarahin gambar yg udah ditambah biar tersimpan di file public/images
    // public function storeImage()
    // {
    //     if (!isset($this->image_name)) {
    //         return null;
    //     }

    //     $extension = $this->image_name->getClientOriginalExtension();
    //     $nameImage = Str::random().'.'.$extension;
    //     $image = 'images/product/'.$nameImage;
    //     \Image::make($this->image_name)->save($nameImage);

    //     return $nameImage;
    // }

    public function deleteInput()
    {
        $this->product_name = null;
        $this->price = null;
        $this->description = null;
        $this->stock = null;
        $this->weight = null;
        $this->image_name = '';
        
    }

    public function render()
    {
        return view('livewire.admin.product.create');
    }
}
