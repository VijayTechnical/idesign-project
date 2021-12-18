<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditTagComponent extends Component
{
    public $tag_slug;
    public $tag_id;
    public $name;
    public $slug;


    public function mount($tag_slug)
    {
        $this->tag_slug = $tag_slug;
        $tag = Tag::where('slug',$tag_slug)->first();
        $this->tag_id = $tag->id;
        $this->name = $tag->name;
        $this->slug = $tag->slug;
    }

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

    public function updateTag()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags,slug,'.$this->tag_id,
        ]);

        $tag = Tag::find($this->tag_id);
        $tag->name = $this->name;
        $tag->slug = $this->slug;
        $tag->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Edited Sucessfully',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.tag.admin-edit-tag-component')->layout('layouts.admin');
    }
}
