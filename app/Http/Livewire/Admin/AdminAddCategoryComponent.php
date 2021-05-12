<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'unique:categories|required',
        ]);
    }

    public function mount()
    {
        SEOTools::setTitle('Admin');
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'unique:categories|required',
        ]);
        $category = new Category();
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->save();
        session()->flash('message', 'Category has been added!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
