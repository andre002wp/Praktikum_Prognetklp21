<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Product;
use App\ProductImage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class Update extends Component
{
    public $product = 59;
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
        ]);

        // $img = $this->storeImage();
        $realimagename = $this->image->getClientOriginalName();
        $this->image->storePubliclyAs('livewire-tmp\images', $realimagename);

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
        $product_image = ProductImage::create([
            'product_id' => $this->product_id,
            'image_name' => $realimagename,
            'slug' => str::slug($this->product_name)
        ]);

        $this->deleteInput();

        return view('livewire.admin.index', [
            'products' => Product::whereNull('deleted_at')->get(),
            'productimages' => ProductImage::all(),
        ]);
        
    }

    public function render()
    {
        return view('livewire.admin.update',[
            'products' => Product::find($this->product)->get(),
        ]);
    }
}
