<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    public $title;
    public $subTitle;
    public $price;
    public $link;
    public $image;
    public $status;

    use WithFileUploads;


    public function addSlide()
    {
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subTitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('sliders', $imageName);
        $slider->image = $imageName;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message', 'Slide has been added!');
    }
    public function mount()
    {
        SEOTools::setTitle('Admin');
        $this->status = 0;
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
