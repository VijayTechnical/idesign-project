<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Support\Str;
use App\Models\ChildCategory;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;
    public $sub_category_id;


    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
    }

    public function storecategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
        if($this->sub_category_id){
            $child_category = new ChildCategory();
            $child_category->name = $this->name;
            $child_category->slug = $this->slug;
            $child_category->sub_category_id = $this->sub_category_id;
            $child_category->save();
        }
        elseif($this->category_id)
        {
            $sub_category = new subcategory();
            $sub_category->name = $this->name;
            $sub_category->slug = $this->slug;
            $sub_category->category_id = $this->category_id;
            $sub_category->save();
        }
        else
        {
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->status = 'active';
            $category->save();
        }
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);
    }


    public function render()
    {
        $categories = Category::all();
        $sub_categories = subcategory::where('category_id',$this->category_id)->get();
        return view('livewire.admin.category.admin-add-category-component',['categories'=>$categories,'sub_categories'=>$sub_categories])->layout('layouts.admin');
    }
}
