<?php

namespace App\Http\Livewire;

use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class ThankyouComponent extends Component
{
    public function mount()
    {
        SEOTools::setTitle('Thank you!');
    }
    public function render()
    {
        return view('livewire.thankyou-component')->layout('layouts.base');
    }
}
