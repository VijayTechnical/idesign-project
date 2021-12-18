<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserOrderDetailComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }


    public function cancelOrder()
    {
        $order = Order::find($this->order_id);
        $order->status = "cancelled";
        $order->cancelled_date = DB::raw('CURRENT_DATE');
        $order->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Your order has been cancelled.',
        ]);
    }

    public function render()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id',$this->order_id)->first();
        return view('livewire.user.user-order-detail-component',['order'=>$order])->layout('layouts.base');
    }
}
