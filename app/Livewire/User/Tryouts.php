<?php

namespace App\Livewire\User;

use App\Models\Tryout;
use Livewire\Component;

class Tryouts extends Component
{
    public function render()
    {
        // Get Data
        $tryouts = Tryout::all();

        return view('livewire.user.tryouts', compact('tryouts'));
    }
}
