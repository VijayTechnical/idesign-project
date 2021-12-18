<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSliderComponent extends Component
{
    use WithPagination;

    public $searchTerm;
    public $paginate;

    protected $listeners = ['delete'];

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'statuscode' => 'warning',
            'title' => '',
            'text' => 'Are you sure, you want to delete?',
            'id' => $id,
        ]);
    }
    public function delete($id)
    {
        $slider = Slider::find($id);
        if ($slider->image) {
            unlink(storage_path('app/public/slider_image/' . $slider->image));
        }
        $slider->delete();
        $this->dispatchBrowserEvent('swal:model', [
            'statuscode' => 'success',
            'title' => 'Successful',
            'text' => 'Record Deleted Sucessfully',
        ]);
    }

    public function render()
    {
        $sliders = Slider::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.slider.admin-slider-component', ['sliders' => $sliders])->layout('layouts.admin');
    }
}
