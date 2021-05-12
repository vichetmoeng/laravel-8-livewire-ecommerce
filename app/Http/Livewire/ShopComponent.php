<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Cart;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;

    public function store($productId, $productName, $productPrice)
    {
        Cart::add($productId, $productName, $productPrice, 1, [])->associate('App\Models\Product');
        session()->flash('message', 'Item added in Cart!');
        return redirect()->route('product.cart');
    }

    public function mount()
    {
        SEOTools::setTitle('Shop');
    }

    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.shop-component', ['products' => $products])->layout('layouts.base');
    }
}
