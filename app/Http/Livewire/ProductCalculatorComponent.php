<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\WithFileUploads;

class ProductCalculatorComponent extends Component
{
    use WithFileUploads;

    public $product;
    public $qty;
    public $sattr = [];
    public $custom_image;
    public $imageName;

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

    public function uploadCustom()
    {
        if ($this->custom_image) {
            $this->imageName = Carbon::now()->timestamp . '.' . $this->custom_image->extension();
            $this->custom_image->storeAS('public/custom_image', $this->imageName);
            $this->dispatchBrowserEvent('swal:model', [
                'statuscode' => 'success',
                'title' => 'Successful',
                'text' => 'Image uploaded sucessfully.',
            ]);
        }
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price, $this->sattr)->associate('App\Models\Product');
        if ($this->imageName) {
            session()->put('custom_image', [
                'id' => $product_id,
                'imageName' => $this->imageName
            ]);
        }
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
