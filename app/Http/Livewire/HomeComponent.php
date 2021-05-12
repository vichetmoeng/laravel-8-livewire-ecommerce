<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class HomeComponent extends Component
{
    public function mount()
    {
        SEOTools::setTitle('Welcome! | Home');
        SEOTools::setDescription('This is our website description');
    }
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();
        $latestProducts = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',', $category->sel_categories);
        $categories = Category::whereIn('id', $cats)->get();
        $no_of_products = $category->no_of_products;
        $pOnSale = Product::where('sale_price', '>', 0)->inRandomOrder()->get()->take(8);
        $saleDate = Sale::find(1);
        return view('livewire.home-component', [
            'sliders' => $sliders,
            'latestProducts' => $latestProducts,
            'categories' => $categories,
            'nOfProducts' => $no_of_products,
            'pOnSales' => $pOnSale,
            'saleDate' => $saleDate
        ])->layout('layouts.base');
    }
}
