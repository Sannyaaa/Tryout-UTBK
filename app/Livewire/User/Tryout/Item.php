<?php

namespace App\Livewire\User\Tryout;

use App\Models\Result;
use App\Models\Tryout;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Request;

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
        
        // Ambil ID user yang sedang login
        $userId = auth()->id();

        // Cek setiap sub-category yang sudah pernah dikerjakan user
        foreach ($categories as $category) {
            foreach ($category->sub_categories as $subCategory) {
                $subCategory->is_completed = Result::where('user_id', $userId)
                                                ->where('sub_category_id', $subCategory->id)
                                                ->exists();
            }
        }

        return view('livewire.user.tryout.item', compact('categories')); 
    }
}
