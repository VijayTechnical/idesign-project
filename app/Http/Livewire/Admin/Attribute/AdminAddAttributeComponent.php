<?php

namespace App\Http\Livewire\Admin\Attribute;

use App\Models\Attribute;
use Livewire\Component;

class AdminAddAttributeComponent extends Component
{
    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
        ]);
    }

    public function storeAttribute()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $pattribute = new Attribute();
        $pattribute->name = $this->name;
        $pattribute->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Added Sucessfully',
        ]);
    }
    public function render()
    {
        return view('livewire.admin.attribute.admin-add-attribute-component')->layout('layouts.admin');
    }
}
