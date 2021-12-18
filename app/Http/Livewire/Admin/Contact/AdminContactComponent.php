<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class AdminContactComponent extends Component
{
    use WithPagination;
    public $paginate;

    protected $listeners = ['delete'];

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

    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        $this->emitTo('admin.header-component', 'refreshComponent');
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $contacts = Contact::orderBy('created_at','DESC')->paginate($this->paginate);
        return view('livewire.admin.contact.admin-contact-component',['contacts'=>$contacts])->layout('layouts.admin');
    }
}
