<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class AdminTagComponent extends Component
{
    use WithPagination;

    protected $listeners = ['delete','statusupdate'];

    public $searchTerm;
    public $paginate;

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
        $tag = Tag::find($id);
        if($tag->status == 'active')
        {
            $tag->status = 'inactive';
        }else
        {
            $tag->status = 'active';
        }
        $tag->save();
    }
    public function delete($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }


    public function render()
    {
        $tags = Tag::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('status', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        $collectionOfRoles = ['Super','Editor'];
        return view('livewire.admin.tag.admin-tag-component', ['tags'=>$tags,'collectionOfRoles'=>$collectionOfRoles])->layout('layouts.admin');
    }
}
