<?php

namespace App\Http\Livewire\Admin\Product;
use App\Product;
use App\ProductImage;
use Livewire\Component;

class Update extends Component
{
    public function render($id)
    {
        dd($id);
        return view('livewire.admin.update',[
            'products' => Product::Where('product_id', $id)->get(),
            'productimages' => ProductImage::Where('product_id', $id)->get()
        ]);
    }
}
