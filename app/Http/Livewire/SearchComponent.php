<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class SearchComponent extends Component
{
    public $search;
    public $productCat;
    public $productCatId;

    public function mount()
    {
        $this->fill(request()->only('search', 'productCat', 'productCatId'));
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->search.'%')->where('category_id', 'like', '%'.$this->productCatId.'%')->paginate(12);
        $categories = Category::all();
        return view('livewire.search-component', ['products' => $products, 'categories' => $categories])->layout('layouts.base');
    }
}
