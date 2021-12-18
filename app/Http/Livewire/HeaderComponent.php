<?php

namespace App\Http\Livewire;

use App\Models\About;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HeaderComponent extends Component
{
    public $searchTerm;

    public function render()
    {

        $categories = Category::orderby('created_at', 'DESC')->get();
        $about = About::find(1);
        return view('livewire.header-component', ['categories' => $categories, 'about' => $about]);
    }
}
