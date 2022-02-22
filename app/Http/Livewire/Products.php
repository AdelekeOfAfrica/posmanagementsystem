<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class Products extends Component
{
    public $products_details = [];

    public function ProductDetails($product_id){
       $this->products_details = Product::where('id', $product_id)->get();
      
    }
    public function render()
    {
        return view('livewire.products', ['products'=> Product::all() ]);
    }
}
