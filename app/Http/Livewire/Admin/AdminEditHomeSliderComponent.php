<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    public $title;
    public $subTitle;
    public $price;
    public $link;
    public $image;
    public $status;

    public $newImage;
    public $sliderId;

    use WithFileUploads;

    public function mount($id)
    {
        $slider = HomeSlider::find($id);
        $this->title = $slider->title;
        $this->subTitle = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->image = $slider->image;
        $this->status = $slider->status;
        $this->sliderId = $slider->id;
        SEOTools::setTitle('Admin | VCVS Book Store Group');
    }

    public function editSlide()
    {
        $slider = HomeSlider::find($this->sliderId);
        $slider->title = $this->title;
        $slider->subtitle = $this->subTitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        if ($this->newImage){
            $imageName = Carbon::now()->timestamp. '.' . $this->newImage->extension();
            $this->newImage->storeAs('sliders', $imageName);
            $slider->image = $imageName;
        }
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message', 'Slide has been edited!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
