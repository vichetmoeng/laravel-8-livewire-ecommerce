<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminHomeSliderComponent extends Component
{

    public function deleteSlide($id)
    {
        $slide = HomeSlider::find($id);
        $slide->delete();
        session()->flash('message', 'Slide has been deleted!');
    }
    public function mount()
    {
        SEOTools::setTitle('Admin');
    }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component', ['sliders' => $sliders])->layout('layouts.base');
    }
}
