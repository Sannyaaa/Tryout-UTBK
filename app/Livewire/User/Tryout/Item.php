<?php

namespace App\Livewire\User\Tryout;

use App\Models\Category;
use Livewire\Component;

class Item extends Component
{
    public function render()
    {
        $categories = Category::
            with('sub_categories')
            ->get();
        // dd($categories);
        
        // foreach($categories as $item) {
        //     echo $item;
        // }
        // die();

        return view('livewire.user.tryout.item', compact('categories')); 
    }
}
