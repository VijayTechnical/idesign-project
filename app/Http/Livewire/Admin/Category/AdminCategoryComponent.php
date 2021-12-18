<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use App\Models\subcategory;
use Livewire\WithPagination;
use App\Models\ChildCategory;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function statusupdate($id)
    {
        $category = Category::find($id);
        if($category->status == 'active')
        {
            $category->status = 'inactive';
        }else
        {
            $category->status = 'active';
        }
        $category->save();
    }
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function deleteSubCategory($id)
    {
        $category = subcategory::find($id);
        $category->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function deleteChildCategory($id)
    {
        $category = ChildCategory::find($id);
        $category->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $categories = Category::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('status', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        $collectionOfRoles = ['Super','Editor'];
        return view('livewire.admin.category.admin-category-component', ['categories'=>$categories,'collectionOfRoles'=>$collectionOfRoles])->layout('layouts.admin');
    }
}
