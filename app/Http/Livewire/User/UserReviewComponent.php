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
        session()->flash('s_review_message','You had sucessfully review this item.');
        $this->clear();
    }

    public function clear()
    {
        $this->rating = '';
        $this->comment = '';
        return redirect()->to('/user/orders');
    }

    public function verifyForReview()
    {
        $orders = Order::where('user_id',Auth::user()->id)->get();
        if($orders)
        {
           foreach($orders as $order)
           {
               foreach($order->OrderItems as $item){
                   if($item->rstatus === 1)
                   {
                    return redirect()->to('/user/orders');
                   }
               }
           }
        }

    }


    public function render()
    {
        $this->verifyForReview();
        return view('livewire.user.user-review-component')->layout('layouts.base');
    }
}
