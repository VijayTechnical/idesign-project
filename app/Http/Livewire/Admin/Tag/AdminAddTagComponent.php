<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddTagComponent extends Component
{
    public $name;
    public $slug;


    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:tags'
        ]);
    }

    public function storeTag()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags'
        ]);

        $category = new Tag();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->status = 'active';
        $category->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.tag.admin-add-tag-component')->layout('layouts.admin');
    }
}
