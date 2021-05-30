<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Product;
use App\ProductImage;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.index', [
            'products' => Product::whereNull('deleted_at')->get(),
            'productimages' => ProductImage::all(),
        ]);
    }

    
}
