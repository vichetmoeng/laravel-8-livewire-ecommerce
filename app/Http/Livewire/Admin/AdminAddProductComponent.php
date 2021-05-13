<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    public $name;
    public $slug;
    public $shortDescription;
    public $description;
    public $regularPrice;
    public $salePrice;
    public $featured;
    public $quantity;
    public $image;
    public $categoryId;

    use WithFileUploads;

    public function mount()
    {
        SEOTools::setTitle('Admin | VCVS Book Store Group');
        $this->featured = 0;
    }

    public function addProduct()
    {
        $product = new Product();
        $product->name = $this->name;
        $product->slug = Str::slug($this->name, '-');
        $product->short_description = $this->shortDescription;
        $product->description = $this->description;
        $product->regular_price = $this->regularPrice;
        $product->sale_price = $this->salePrice;
        $product->SKU = 'SKU'.mt_rand(0000, 9999);
        $this->quantity > 0 ? $product->stock_status = 'instock' : $product->stock_status = 'outofstock';
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;
        $product->category_id = $this->categoryId;
        $product->save();
        session()->flash('message', 'Product has been added!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component', ['categories' => $categories])->layout('layouts.base');
    }
}
