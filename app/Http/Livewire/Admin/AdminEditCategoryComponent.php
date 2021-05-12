<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminEditCategoryComponent extends Component
{
    public $categorySlug;
    public $categoryId;
    public $name;

    public function mount($slug)
    {
        $this->categorySlug = $slug;
        $category = Category::where('slug', $slug)->first();
        $this->categoryId = $category->id;
        $this->name = $category->name;
        SEOTools::setTitle('Admin');

    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'unique:categories|required',
        ]);
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'unique:categories|required',
        ]);
        $category = Category::find($this->categoryId);
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->save();
        session()->flash('message', 'Category has been updated!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.base');
    }
}
