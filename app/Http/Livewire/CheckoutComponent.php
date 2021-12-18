<?php

namespace App\Http\Livewire;

use Notification;
use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use App\Models\Shipping;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderNotification;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutComponent extends Component
{

    public $ship_to_different;
    public $paymentmode;
    public $thankyou;
    public $order_id;

    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;

    public $s_firstname;
    public $s_lastname;
    public $s_mobile;
    public $s_email;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;

    public function mount()
    {
        $this->paymentmode = 'cod';
    }


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'line1' => 'required',
            'line2' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
        ]);

        if ($this->ship_to_different) {
            $this->validateOnly($fields, [
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_mobile' => 'required|numeric',
                's_email' => 'required|email',
                's_line1' => 'required',
                's_line2' => 'required',
                's_city' => 'required',
                's_province' => 'required',
                's_country' => 'required',
            ]);
        }
    }
    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'line1' => 'required',
            'line2' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = str_replace(",", "", session()->get('checkout')['subtotal']);
        $order->discount = str_replace(",", "", session()->get('checkout')['discount']);
        $order->tax = str_replace(",", "", session()->get('checkout')['tax']);
        $order->total = str_replace(",", "", session()->get('checkout')['total']);
        $order->firstname =  $this->firstname;
        $order->lastname =  $this->lastname;
        $order->mobile =  $this->mobile;
        $order->email =  $this->email;
        $order->line1 =  $this->line1;
        $order->line2 =  $this->line2;
        $order->city =  $this->city;
        $order->province =  $this->province;
        $order->country =  $this->country;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1 : 0;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            if ($item->options) {
                $orderItem->options = serialize($item->options);
            }
            $orderItem->save();
        }

        if ($this->ship_to_different) {
            $this->validate([
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_mobile' => 'required|numeric',
                's_email' => 'required|email',
                's_line1' => 'required',
                's_line2' => 'required',
                's_city' => 'required',
                's_province' => 'required',
                's_country' => 'required',
            ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname =  $this->s_firstname;
            $shipping->lastname =  $this->s_lastname;
            $shipping->mobile =  $this->s_mobile;
            $shipping->email =  $this->s_email;
            $shipping->line1 =  $this->s_line1;
            $shipping->line2 =  $this->s_line2;
            $shipping->city =  $this->s_city;
            $shipping->province =  $this->s_province;
            $shipping->country =  $this->s_country;
            $shipping->save();
        }


        if ($this->paymentmode == 'cod') {
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();
        } elseif ($this->paymentmode == 'esewa') {
            $this->dispatchBrowserEvent('submitEsewa');
            $this->order_id = $order->id;
            $this->makeTransaction($order->id, 'pending');
        } elseif ($this->paymentmode == 'khalti') {
            $this->dispatchBrowserEvent('showKhalti');
            $this->order_id = $order->id;
            $this->makeTransaction($order->id, 'pending');
        }
    }


    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy(Auth::user()->email);
        session()->forget('checkout');
        $admin = User::where('utype', 'ADM')->first();

        $order = [
            'name' => Auth::user()->name,
            'method' => $this->paymentmode
        ];

        $admin = User::where('utype','ADM')->first();
        Notification::send($admin, new OrderNotification($order));
    }

    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentmode;
        $transaction->status = $status;
        $transaction->save();
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thankyou) {
            return redirect()->route('thankyou');
        } else if (!session()->get('checkout')) {
            return redirect()->route('cart');
        }
    }


    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
