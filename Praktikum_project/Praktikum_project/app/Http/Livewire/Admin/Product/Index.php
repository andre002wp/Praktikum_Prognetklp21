<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Product;
use App\ProductImage;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.product.index', [
            'products' => Product::WhereNull('deleted_at')->get(),
            'productimages' => ProductImage::orderBy('created_at', 'desc')->get()
        ]);
    }
}
