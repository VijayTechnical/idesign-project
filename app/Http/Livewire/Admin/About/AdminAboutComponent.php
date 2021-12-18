<?php

namespace App\Http\Livewire\Admin\About;

use App\Models\About;
use Livewire\Component;

class AdminAboutComponent extends Component
{
    public $email;
    public $description;
    public $phone;
    public $customers_service_number;
    public $location;
    public $opening_day;
    public $opening_hour;
    public $youtube;
    public $facebook;
    public $instagram;
    public $twitter;


    public function mount()
    {
        $about = About::find(1);
        if($about)
        {
            $this->email = $about->email;
            $this->description = $about->description;
            $this->phone = $about->phone;
            $this->customers_service_number = $about->customers_service_number;
            $this->location = $about->location;
            $this->opening_day = $about->opening_day;
            $this->opening_hour = $about->opening_hour;
            $this->youtube = $about->youtube;
            $this->facebook = $about->facebook;
            $this->instagram = $about->instagram;
            $this->twitter = $about->twitter;
        }
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'email' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'customers_service_number' => 'required',
            'location' => 'required',
            'opening_day' => 'required',
            'opening_hour' => 'required',
            'youtube' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
        ]);
    }

    public function updateAbout()
    {
        $this->validate([
            'email' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'customers_service_number' => 'required',
            'location' => 'required',
            'opening_day' => 'required',
            'opening_hour' => 'required',
            'youtube' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
        ]);

        $about = About::find(1);
        if($about){
            $about->email = $this->email;
            $about->description = $this->description;
            $about->phone = $this->phone;
            $about->customers_service_number = $this->customers_service_number;
            $about->location = $this->location;
            $about->opening_day = $this->opening_day;
            $about->opening_hour = $this->opening_hour;
            $about->youtube = $this->youtube;
            $about->facebook = $this->facebook;
            $about->instagram = $this->instagram;
            $about->twitter = $this->twitter;
            $about->save();
        }
        else{
            $about = new About();
            $about->email = $this->email;
            $about->description = $this->description;
            $about->phone = $this->phone;
            $about->customers_service_number = $this->customers_service_number;
            $about->location = $this->location;
            $about->opening_day = $this->opening_day;
            $about->opening_hour = $this->opening_hour;
            $about->youtube = $this->youtube;
            $about->facebook = $this->facebook;
            $about->instagram = $this->instagram;
            $about->twitter = $this->twitter;
            $about->save();
        }
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }


    public function render()
    {
        return view('livewire.admin.about.admin-about-component')->layout('layouts.admin');
    }
}
