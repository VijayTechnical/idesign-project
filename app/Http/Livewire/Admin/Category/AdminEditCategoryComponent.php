<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Support\Str;
use App\Models\ChildCategory;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;
    public $sub_category_id;
    public $sub_category_slug;
    public $child_category_slug;
    public $child_category_id;


    public function mount($category_slug=null,$sub_category_slug=null,$child_category_slug=null)
    {
        if($child_category_slug)
        {
            $this->child_category_slug = $child_category_slug;
            $child_category = ChildCategory::where('slug',$child_category_slug)->first();
            $this->child_category_id = $child_category->id;
            $this->sub_category_id = $child_category->sub_category_id;
            $this->name = $child_category->name;
            $this->slug = $child_category->slug;
        }
        elseif($sub_category_slug)
        {
            $this->sub_category_slug = $sub_category_slug;
            $sub_category = subcategory::where('slug',$sub_category_slug)->first();
            $this->sub_category_id = $sub_category->id;
            $this->category_id = $sub_category->category_id;
            $this->name = $sub_category->name;
            $this->slug = $sub_category->slug;
        }
        else
        {
            $this->category_slug = $category_slug;
            $category = Category::where('slug',$category_slug)->first();
            $this->category_id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
        }
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$this->category_id,
        ]);
    }

    public function updatecategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$this->category_id,
        ]);

        if($this->child_category_id)
        {
            $child_category = ChildCategory::find($this->child_category_id);
            $child_category->name = $this->name;
            $child_category->slug = $this->slug;
            $child_category->sub_category_id = $this->sub_category_id;
            $child_category->save();

        }
        elseif($this->sub_category_id)
        {
            $sub_category = subcategory::find($this->sub_category_id);
            $sub_category->name = $this->name;
            $sub_category->slug = $this->slug;
            $sub_category->category_id = $this->category_id;
            $sub_category->save();

        }
        else
        {
            $category = Category::find($this->category_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
        }
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Edited Sucessfully',
        ]);
    }


    public function render()
    {
        $categories = Category::all();
        $sub_categories = subcategory::where('category_id',$this->category_id)->get();
        return view('livewire.admin.category.admin-edit-category-component',['categories'=>$categories,'sub_categories'=>$sub_categories])->layout('layouts.admin');
    }
}
