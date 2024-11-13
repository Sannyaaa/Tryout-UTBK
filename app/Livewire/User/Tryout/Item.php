<?php

namespace App\Livewire\User\Tryout;

use App\Models\Category;
use App\Models\Tryout;
use Illuminate\Http\Request;
use Livewire\Component;

class Item extends Component
{
    public $tryoutId;

    public $tryout;

    public function mount(Request $request) {
        $this->tryoutId = $request->segment(3);

        $this->tryout = Tryout::where('id', $this->tryoutId)->first();
    }

    public function render()
    {
        $categories = Category::with('sub_categories')->get();
        // dd($categories);
        
        // foreach($categories as $item) {
        //     echo $item;
        // }
        // die();

        return view('livewire.user.tryout.item', compact('categories')); 
    }
}
