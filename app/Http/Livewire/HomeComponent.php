<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Slider;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeComponent extends Component
{
    use WithPagination;
    public $qty;
    public $paginate;

    public function mount()
    {
        $this->qty = 1;
        $this->paginate = 12;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Product added to your cart',
        ]);
        return redirect()->route('cart');
    }

    public function render()
    {
        // $ms_products = DB::table('products')
        //     ->select([
        //         'products.id',
        //         DB::raw('COUNT(*) as total_sales'),
        //         DB::raw('SUM(IFNULL(products.sale_price, products.regular_price) * order_items.quantity) AS total_price'),
        //     ])
        //     ->join('order_items', 'order_items.product_id', '=', 'products.id')
        //     ->join('orders', 'order_items.order_id', '=', 'orders.id')
        //     ->where('orders.status', 'delivered')
        //     ->groupBy('products.id')
        //     ->orderByDesc('total_sales')
        //     ->get();

        // if ($ms_products->count() > 0) {
        //     $ts_products = [];
        //     foreach ($ms_products as $ms_product) {
        //         $ts_products[] = Product::find($ms_product->id);
        //     }
        // }

        $r_products = Product::orderBy('created_at', 'DESC')->paginate($this->paginate);
        $sliders = Slider::all();
        $products = Product::paginate($this->paginate);
        return view('livewire.home-component', ['sliders' => $sliders, 'products' => $products,'r_products' => $r_products])->layout('layouts.base');
    }
}
