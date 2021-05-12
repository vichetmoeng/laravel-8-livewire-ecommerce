<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $qty;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
        SEOTools::setTitle(Product::where('slug', $slug)->first()->name);
    }

    public function increaseQuantity()
    {
        $this->qty++;
    }
    public function decreaseQuantity()
    {
        if ($this->qty > 1){
            $this->qty--;
        }
    }

    public function store($productId, $productName, $productPrice)
    {
        Cart::add($productId, $productName, $productPrice, $this->qty, [])->associate('App\Models\Product');
        session()->flash('message', 'Item added in Cart!');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $relatedProducts = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(10)->get();
        $saleDate = Sale::find(1);
        return view('livewire.details-component', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'saleDate' => $saleDate
        ])->layout('layouts.base');
    }
}
