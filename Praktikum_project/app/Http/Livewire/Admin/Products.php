<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Product;
use App\ProductImage;
use Illuminate\Support\Facades\DB;

class Products extends Component
{
    use WithFileUploads;

    public $product;
    public $product_name;
    public $image;
    public $price;
    public $description;
    public $stock;
    public $weight;
    public $product_id; 

    public function render()
    {
        $product = Product::whereNull('deleted_at')->get();
        $this->product = $product;
        return view('livewire.admin.index',[
            'products' => $product,
            'mode' => 'index',
            'productimages' => ProductImage::all(),
        ]);
    }

    private function resetInputFields(){
        $this->product_name = null;
        $this->price = null;
        $this->description = null;
        $this->stock = null;
        $this->weight = null;
        $this->image_name = '';
    }

    public function add()
    {
        return view('livewire.admin.add');
        $this->validate([
            'product_name' => 'required|min:6',
        ]);

        // $img = $this->storeImage();
        $realimagename = $this->image->getClientOriginalName();
        $this->image->storePubliclyAs('livewire-tmp\images', $realimagename);

        $this->product = Product::create([
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

        session()->flash('message', 'Product berhasil ditambahkan');

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::where('id',$id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {

        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            User::where('id',$id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }
}
