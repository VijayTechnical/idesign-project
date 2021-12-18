<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\WithPagination;
use App\Models\ChildCategory;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CategoryComponent extends Component
{
    use WithPagination;


    public $sorting;
    public $paginate;

    public $child_category_slug;


    public $qty;

    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->paginate = 12;
        $this->child_category_slug = $category_slug;
        $this->qty = 1;
    }

    public function increaseQuantity()
    {
        $this->qty++;
    }

    public function decreaseQuantity()
    {
        if ($this->qty > 1) {
            $this->qty--;
        }
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
        $category = ChildCategory::where('slug',$this->child_category_slug)->first();
        if($category)
        {
            $category_id = $category->id;
        }
        if ($this->sorting == 'date') {
            $products = Product::where('stock_status', 'instock')->where('child_category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($this->paginate);
        } else if ($this->sorting == 'price') {
            $products = Product::where('stock_status', 'instock')->where('child_category_id', $category_id)->orderBy('regular_price', 'ASC')->paginate($this->paginate);
        } else if ($this->sorting == 'price-desc') {
            $products = Product::where('stock_status', 'instock')->where('child_category_id', $category_id)->orderBy('regular_price', 'DESC')->paginate($this->paginate);
        } else {
            $products = Product::where('stock_status', 'instock')->where('child_category_id', $category_id)->paginate($this->paginate);
        }

        $categories = Category::where('status', 'active')->get();

        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.category-component',['categories'=>$categories,'products'=>$products])->layout('layouts.base');
    }
}
