<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class AboutusComponent extends Component
{
    public function mount()
    {
        SEOTools::setTitle('About Us | VCVS Book Store Group');
        SEOTools::setDescription('This is about us');
    }
    public function render()
    {
        $itemInstore = Product::all()->count();
        $countUsers = User::all()->count();
        return view('livewire.aboutus-component', ['itemsInStore' => $itemInstore, 'countUsers' => $countUsers])->layout('layouts.base');
    }
}
