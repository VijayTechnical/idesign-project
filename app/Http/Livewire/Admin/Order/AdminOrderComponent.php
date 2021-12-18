<?php

namespace App\Http\Livewire\Admin\Order;

use PDF;
use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminOrderComponent extends Component
{
    use WithPagination;

    public $searchTerm;
    public $paginate;

    protected $listeners = ['delete', 'statusupdate'];

    public function mount()
    {
        $this->paginate = 10;
        $this->download = false;
    }


    public function statusDelivered($id, $status)
    {
        $this->dispatchBrowserEvent('swal:confirmDelivered', [
            'statuscode' => 'warning',
            'title' => '',
            'text' => 'Are you sure the order is delivered?',
            'id' => $id,
            'status' => $status
        ]);
    }

    public function statusCancelled($id, $status)
    {
        $this->dispatchBrowserEvent('swal:confirmDelivered', [
            'statuscode' => 'warning',
            'title' => '',
            'text' => 'Are you sure you want to cancelled the order?',
            'id' => $id,
            'status' => $status
        ]);
    }

    public function statusupdate($id, $status)
    {
        $order = Order::find($id);
        if ($order->status == 'ordered') {
            $order->status = $status;
            if ($status == 'delivered') {
                $order->delivered_date = DB::raw('CURRENT_DATE');
                $order->save();
                $this->dispatchBrowserEvent('swal:model', [
                    'statuscode' => 'success',
                    'title' => 'Successful',
                    'text' => 'Status updated sucessfully.',
                ]);
            } else if ($status == 'cancelled') {
                $order->cancelled_date = DB::raw('CURRENT_DATE');
                $order->save();
                $this->dispatchBrowserEvent('swal:model', [
                    'statuscode' => 'success',
                    'title' => 'Successful',
                    'text' => 'Order is cancelled Sucessfully.',
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('swal:model', [
                'statuscode' => 'error',
                'title' => 'Error',
                'text' => 'OPS!,Sorry you can not change the status.',
            ]);
        }
    }


    public function render()
    {
        $orders = Order::query()
            ->where('id', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('firstname', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('lastname', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('email', 'LIKE', "%{$this->searchTerm}%")
            ->orderBy('created_at', 'DESC')->paginate($this->paginate);
        return view('livewire.admin.order.admin-order-component', ['orders' => $orders])->layout('layouts.admin');
    }
}
