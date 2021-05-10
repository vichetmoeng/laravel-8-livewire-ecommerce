<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
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
