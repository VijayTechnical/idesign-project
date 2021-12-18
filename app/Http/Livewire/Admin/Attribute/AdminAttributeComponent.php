<?php

namespace App\Http\Livewire\Admin\Attribute;

use App\Models\Attribute;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAttributeComponent extends Component
{
    use WithPagination;

    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteAttribute($id)
    {
        $pattribute = Attribute::find($id);
        $pattribute->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $pattributes = Attribute::query()
        ->where('id', 'LIKE', "%{$this->searchTerm}%")
        ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
        ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        $collectionOfRoles = ['Super','Editor'];
        return view('livewire.admin.attribute.admin-attribute-component',['pattributes'=>$pattributes,'collectionOfRoles'=>$collectionOfRoles])->layout('layouts.admin');
    }
}
