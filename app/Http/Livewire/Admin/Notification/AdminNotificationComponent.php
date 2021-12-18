<?php

namespace App\Http\Livewire\Admin\Notification;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminNotificationComponent extends Component
{
    public function status()
    {
        $user = User::find(Auth::user()->id);

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        $this->emitTo('admin.header-component','refreshComponent');
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Notification is read sucessfully',
        ]);
    }

    public function render()
    {
        $notifications = Auth::user()->unreadNotifications;
        return view('livewire.admin.notification.admin-notification-component',['notifications'=>$notifications])->layout('layouts.admin');
    }
}
