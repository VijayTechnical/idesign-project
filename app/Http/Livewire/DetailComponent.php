<?php

namespace App\Http\Livewire;

use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class DetailComponent extends Component
{
    public $slug;
    public $product_id;
    public $qty;
    public $sattr = [];

    public function mount($slug)
    {
        $this->slug = $slug;
        $product = Product::where('slug',$this->slug)->first();
        $this->product_id = $product->id;
        $this->qty = 1;
    }

    public function increaseQuantity()
    {
        $this->qty++;
    }

    public function decreaseQuantity()
    {
        if($this->qty > 1)
        {
            $this->qty--;
        }
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price,$this->sattr)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Product added to your cart.',
        ]);
        return redirect()->route('cart');
    }

    public function render()
    {
        $product = Product::find($this->product_id);
        $orderItems = $product->orderItems()->where('rstatus', 1)->get();
        $r_products = Product::where('stock_status','instock')->where('category_id',$product->category_id)->limit(5)->get();
        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.detail-component',['product'=>$product,'r_products'=>$r_products,'orderItems'=>$orderItems])->layout('layouts.base');
    }
}
