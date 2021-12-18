<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Contact;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HeaderComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];


    public function render()
    {
        $contacts = Contact::orderBy('created_at', 'DESC')->get();
        $notifications = Auth::user()->unreadNotifications;
        return view('livewire.admin.header-component',['contacts'=>$contacts,'notifications'=>$notifications]);
    }
}
