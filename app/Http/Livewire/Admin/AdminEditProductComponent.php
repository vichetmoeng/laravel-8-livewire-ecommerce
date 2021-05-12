<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    public $name;
    public $slug;
    public $shortDescription;
    public $description;
    public $regularPrice;
    public $salePrice;
    public $stockStatus;
    public $featured;
    public $quantity;
    public $image;
    public $categoryId;
    public $newImage;
    public $productId;

    use WithFileUploads;

    public function mount($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->shortDescription = $product->short_description;
        $this->description = $product->description;
        $this->regularPrice = $product->regular_price;
        $this->salePrice = $product->sale_price;
        $this->stockStatus = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->categoryId = $product->category_id;
        $this->productId = $product->id;
        SEOTools::setTitle('Admin');
    }

    public function updateProduct()
    {
        $product = Product::find($this->productId);
        $product->name = $this->name;
        $product->slug = Str::slug($this->name, '-');
        $product->short_description = $this->shortDescription;
        $product->description = $this->description;
        $product->regular_price = $this->regularPrice;
        $product->sale_price = $this->salePrice;
        $product->stock_status = $this->stockStatus;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        if ($this->newImage)
        {
            $imageName = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('products', $imageName);
            $product->image = $imageName;
        }
        $product->category_id = $this->categoryId;
        $product->save();
        session()->flash('message', 'Product has been edited!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component', ['categories' => $categories])->layout('layouts.base');
    }
}
