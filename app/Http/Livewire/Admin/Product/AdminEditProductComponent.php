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

class AdminEditProductComponent extends Component
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
    public $sub_category_id;
    public $child_category_id;
    public $tag_id;
    public $newimage;
    public $newimages;
    public $product_id;
    public $oldimages = [];

    public $attr;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values = [];


    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->images = $product->images;
        $this->category_id = $product->category_id;
        $this->sub_category_id = $product->subcategory_id;
        $this->child_category_id = $product->child_category_id;
        $this->tag_id = $product->tag_id;
        $this->product_id = $product->id;

        $this->inputs = $product->attributeValues->where('product_id')->unique('attribute_id')->pluck('attribute_id');
        $this->attribute_arr = $product->attributeValues->where('product_id')->unique('attribute_id')->pluck('attribute_id');

        foreach ($this->attribute_arr as $a_arr) {
            $allattributeValue = AttributeValue::where('product_id', $product->id)->where('attribute_id', $a_arr)->get()->pluck('value');
            $valueString = '';
            foreach ($allattributeValue as $value) {
                $valueString = $valueString . $value . ',';
            }
            $this->attribute_values[$a_arr] = rtrim($valueString, ",");
        }
    }

    public function add()
    {
        if (!$this->attribute_arr->contains($this->attr)) {
            $this->inputs->push($this->attr);
            $this->attribute_arr->push($this->attr);
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
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:products,slug,' . $this->product_id,
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
            'tag_id' => 'required',
            'newimage' => 'required|mimes:png,jpg'
        ]);
    }


    public function editProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug,' . $this->product_id,
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
            'tag_id' => 'required',
        ]);


        $product = Product::find($this->product_id);
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
        if ($this->newimage) {
            if ($product->image) {
                unlink(storage_path('app/public/product_image/' . $product->image));
            }
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAS('public/product_image', $imageName);
            $product->image = $imageName;
        } else {
            $product->image = $this->image;
        }
        if ($this->newimages) {
            if ($product->images) {
                $images = explode(",", $product->images);
                if ($images) {
                    foreach ($images as $key => $image) {
                        if ($image) {
                            unlink(storage_path('app/public/product_image/' . $image));
                        }
                    }
                }
            }
            $imagesName = '';
            foreach ($this->newimages as $key => $image) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('public/product_image', $imgName);
                $imagesName = $imagesName . ',' . $imgName;
            }
            $product->images = $imagesName;
        } else {
            if ($this->images) {
                $oldimages = explode(',', $this->images);
                $product->images = implode(',', $oldimages);
            }
        }
        $product->category_id = $this->category_id;
        if ($this->sub_category_id) {
            $product->subcategory_id = $this->sub_category_id;
        }
        if($this->child_category_id)
        {
            $product->child_category_id = $this->child_category_id;
        }
        $product->tag_id = $this->tag_id;
        $product->save();
        AttributeValue::where('product_id', $product->id)->delete();
        foreach ($this->attribute_values as $key => $attribute_value) {
            $avalues = explode(",", $attribute_value);
            foreach ($avalues as $avalue) {
                $attr_value = new AttributeValue();
                $attr_value->attribute_id = $key;
                $attr_value->value = $avalue;
                $attr_value->product_id = $product->id;
                $attr_value->save();
            }
        }
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }

    public function changeSubcategory()
    {
        $this->scategory_id = 0;
    }

    public function render()
    {
        $categories = Category::where('status', 'active')->get();
        $sub_categories = subcategory::where('category_id',$this->category_id)->get();
        $child_categories = ChildCategory::where('sub_category_id',$this->sub_category_id)->get();
        $pattributes = Attribute::all();
        $tags = Tag::where('status', 'active')->get();
        return view('livewire.admin.product.admin-edit-product-component', ['categories' => $categories, 'tags' => $tags, 'sub_categories' => $sub_categories, 'child_categories'=>$child_categories,'pattributes' => $pattributes])->layout('layouts.admin');
    }
}
