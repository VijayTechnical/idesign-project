<?php

namespace App\Http\Livewire\Admin\Product;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\subcategory;
use Illuminate\Support\Str;
use App\Models\ChildCategory;
use Livewire\WithFileUploads;
use App\Models\AttributeValue;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;


    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $images;
    public $category_id;
    public $tag_id;
    public $sub_category_id;
    public $child_category_id;

    public $attr;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values;


    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
        $this->category_id = 0;
        $this->sub_category_id = 0;
        $this->child_category_id = 0;
        $this->tag_id = 0;
    }

    public function add()
    {
        if(!in_array($this->attr,$this->attribute_arr))
        {
            array_push($this->inputs,$this->attr);
            array_push($this->attribute_arr,$this->attr);
        }
    }

    public function remove($attr)
    {
        unset($this->inputs[$attr]);
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png',
            'category_id' => 'required',
            'tag_id' => 'required',
        ]);
    }

    public function addProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png',
            'category_id' => 'required',
            'tag_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
        $this->image->storeAS('public/product_image', $imageName);
        $product->image = $imageName;

        if($this->images)
        {
            $imagesName = '';
            foreach($this->images as $key=>$image)
            {
                $imgName = Carbon::now()->timestamp. $key. '.' .$image->extension();
                $image->storeAs('public/product_image',$imgName);
                $imagesName = $imagesName.','. $imgName;
            }
            $product->images = $imagesName;
        }
        $product->category_id = $this->category_id;
        if($this->sub_category_id)
        {
            $product->subcategory_id = $this->sub_category_id;
        }
        if($this->child_category_id)
        {
            $product->child_category_id = $this->child_category_id;
        }
        $product->tag_id = $this->tag_id;
        $product->save();
        foreach($this->attribute_values as $key=>$attribute_value)
        {
            $avalues = explode(",",$attribute_value);
            foreach($avalues as $avalue)
            {
                $attr_value =  new AttributeValue();
                $attr_value->attribute_id = $key;
                $attr_value->value = $avalue;
                $attr_value->product_id = $product->id;
                $attr_value->save();
            }
        }
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);
    }

    public function changeSubcategory()
    {
        $this->scategory_id = 0;
    }



    public function render()
    {
        $categories = Category::where('status','active')->get();
        $sub_categories = subcategory::where('category_id',$this->category_id)->get();
        $child_categories = ChildCategory::where('sub_category_id',$this->sub_category_id)->get();
        $tags = Tag::where('status','active')->get();
        $parrributes = Attribute::all();
        return view('livewire.admin.product.admin-add-product-component',['categories'=>$categories,'tags'=>$tags,'sub_categories'=>$sub_categories,'child_categories'=>$child_categories,'pattributes'=>$parrributes])->layout('layouts.admin');
    }
}
