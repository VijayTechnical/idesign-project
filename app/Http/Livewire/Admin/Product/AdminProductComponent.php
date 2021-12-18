<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    public $paginate;
    public $searchTerm;

    protected $listeners = ['delete','statusupdate'];

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm',[
            'statuscode' => 'warning',
            'title' => '',
            'text' => 'Are you sure, you want to delete?',
            'id' => $id,
        ]);
    }
    public function statusConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirmstatus',[
            'statuscode' => 'warning',
            'title' => '',
            'text' => 'Are you sure you want to update the status?',
            'id' => $id,
        ]);
    }
    public function statusupdate($id)
    {
        $product = Product::find($id);
        if($product->stock_status == 'instock')
        {
            $product->stock_status = 'outofstock';
        }else
        {
            $product->stock_status = 'instock';
        }
        $product->save();
    }
    public function delete($id)
    {
        $product = Product::find($id);
        if($product->images)
        {
            $images = explode(",",$product->images);
            if($images)
            {
                foreach($images as $key=>$image)
                {
                    if($image)
                    {
                        unlink(storage_path('app/public/product_image/'.$image));
                    }
                }
            }
        }
        if($product->image)
        {
            unlink(storage_path('app/public/product_image/'.$product->image));
        }
        $product->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $products = Product::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('regular_price', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('sale_price', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('SKU', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('stock_status', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        $collectionOfRoles = ['Super','Editor'];
        return view('livewire.admin.product.admin-product-component',['products'=>$products,'collectionOfRoles'=>$collectionOfRoles])->layout('layouts.admin');
    }
}
