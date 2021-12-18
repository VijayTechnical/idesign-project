<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductCalculatorComponent extends Component
{
    public $product;
    public $qty;
    public $sattr = [];

    protected $listeners = ['open' => 'loadModel'];

    public function mount()
    {
        $this->qty = 1;
    }

    public function loadModel($id)
    {
        $this->product = Product::find($id);
        $this->dispatchBrowserEvent('showProductCalculator');
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price,$this->sattr)->associate('App\Models\Product');
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Product added to your cart.',
        ]);
        return redirect()->route('cart');
    }



    public function render()
    {
        return view('livewire.product-calculator-component');
    }
}
