<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Cart;

class SearchComponent extends Component
{
    public $search;
    public $productCat;
    public $productCatId;

    public function mount()
    {
        $this->fill(request()->only('search', 'productCat', 'productCatId'));
        SEOTools::setTitle('Search | VCVS Book Store Group');
    }

    public function store($productId, $productName, $productPrice)
    {
        Cart::add($productId, $productName, $productPrice, 1, [])->associate('App\Models\Product');
        session()->flash('message', 'Item added in Cart!');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->search.'%')->where('category_id', 'like', '%'.$this->productCatId.'%')->paginate(12);
        $categories = Category::all();
        return view('livewire.search-component', ['products' => $products, 'categories' => $categories])->layout('layouts.base');
    }
}
