<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddSliderComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $image;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'image' => 'required|mimes:png,jpg'
        ]);
    }

    public function addSlider()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg'
        ]);

        $slider = new Slider();
        $slider->name = $this->name;
        $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
        $this->image->storeAS('public/slider_image', $imageName);
        $slider->image = $imageName;
        $slider->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.slider.admin-add-slider-component')->layout('layouts.admin');
    }
}
