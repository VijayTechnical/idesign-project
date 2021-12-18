<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\About;
use Livewire\Component;
use App\Models\Subscriber;
use App\Notifications\SubscriberNotification;
use Notification;

class FooterComponent extends Component
{
    public $email;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'email' => 'required'
        ]);
    }

    public function addSubscriber()
    {
        $this->validate([
            'email' => 'required'
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $this->email;
        $subscriber->save();
        $admin = User::where('utype','ADM')->first();
        Notification::send($admin, new SubscriberNotification($subscriber));
        $this->emitTo('admin.header-component', 'refreshComponent');
        $this->clear();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'You have sucessfully subscribed us,you will be notified about our latest updates.Thankyou!!!',
        ]);
    }

    public function clear()
    {
        $this->email = '';
    }


    public function render()
    {
        $about = About::find(1);
        return view('livewire.footer-component', ['about' => $about]);
    }
}
