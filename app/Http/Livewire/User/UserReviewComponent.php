<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use App\Models\Review;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class UserReviewComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;

    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }



    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'rating' => 'required',
            'comment' => 'required',
        ]);
    }

    public function addReview()
    {
        $this->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $review = new Review();
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->order_item_id = $this->order_item_id;
        $review->save();

        $orderItem = OrderItem::find($this->order_item_id);
        $orderItem->rstatus = true;
        $orderItem->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Review added sucessfully.',
        ]);
        $this->clear();
    }

    public function clear()
    {
        $this->rating = '';
        $this->comment = '';
        return redirect()->to('/user/orders');
    }


    public function render()
    {
        return view('livewire.user.user-review-component')->layout('layouts.base');
    }
}
