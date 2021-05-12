<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class AboutusComponent extends Component
{
    public function render()
    {
        $itemInstore = Product::all()->count();
        $countUsers = User::all()->count();
        return view('livewire.aboutus-component', ['itemsInStore' => $itemInstore, 'countUsers' => $countUsers])->layout('layouts.base');
    }
}