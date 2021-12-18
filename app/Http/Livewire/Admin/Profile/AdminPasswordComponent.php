<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminPasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $this->user_id = Auth::user()->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);

        if(Hash::check($this->current_password,Auth::user()->password))
        {
            $user = User::findOrFail($this->user_id);
            $user->password = Hash::make($this->password);
            $user->save();
            $this->clear();
            $this->dispatchBrowserEvent('swal:model', [
                'statuscode' => 'success',
                'title' => 'Successful',
                'text' => 'Password Updated Sucessfully',
            ]);
        }
        else
        {
            $this->dispatchBrowserEvent('swal:model', [
                'statuscode' => 'success',
                'title' => 'Successful',
                'text' => 'Password does not match',
            ]);
        }
    }

    public function clear()
    {
        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';

        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.admin.profile.admin-password-component')->layout('layouts.admin');
    }
}
