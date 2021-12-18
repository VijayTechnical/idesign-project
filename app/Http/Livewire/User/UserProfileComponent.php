<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class UserProfileComponent extends Component
{
    use WithFileUploads;

    public $image;
    public $newimage;
    public $name;
    public $email;

    public function mount()
    {
        $user = Auth::user();
        $this->image = $user->profile_photo_path;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'newimage' => 'required|mimes:png,jpg',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
         ]);
    }

    public function updateUser()
    {

        $this->validate([
           'name' => 'required',
           'email' => 'required|email|unique:users,email,'.Auth::user()->id,
        ]);

        $user = Auth::user();
        if ($this->newimage) {
            if ($user->profile_photo_path) {
                unlink(storage_path('app/public/user_image/' . $user->image));
            }
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAS('public/user_image', $imageName);
            $user->profile_photo_path = $imageName;
        } else {
            $user->profile_photo_path = $this->image;
        }
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Profile Updated sucessfully.',
        ]);
    }

    public function render()
    {
        return view('livewire.user.user-profile-component')->layout('layouts.base');
    }
}
