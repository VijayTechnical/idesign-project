<?php

namespace App\Http\Livewire\Admin\Attribute;

use Livewire\Component;
use App\Models\Attribute;

class AdminEditAttributeComponent extends Component
{
    public $name;
    public $attribute_id;

    public function mount($attribute_id)
    {
        $this->attribute_id = $attribute_id;
        $pattribute = Attribute::find($this->attribute_id);
        $this->name = $pattribute->name;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
        ]);
    }

    public function updateAttribute()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $pattribute = Attribute::find($this->attribute_id);
        $pattribute->name = $this->name;
        $pattribute->save();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Updated Sucessfully',
        ]);
    }


    public function render()
    {
        return view('livewire.admin.attribute.admin-edit-attribute-component')->layout('layouts.admin');
    }
}
