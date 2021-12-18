<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ModalComponent extends Component
{
    public $product;
    public $qty;

    protected $listeners = ['open' => 'loadModel'];

    public function loadModel($id)
    {
        $this->product = Product::find($id);
        $this->dispatchBrowserEvent('showModel');
    }

    public function mount(){
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
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Product added to your cart.',
        ]);
        return redirect()->route('cart');
    }



    public function render()
    {
        return view('livewire.modal-component');
    }
}
