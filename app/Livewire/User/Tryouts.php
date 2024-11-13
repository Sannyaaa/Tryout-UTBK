<?php

namespace App\Livewire\User;

use App\Models\Tryout;
use Livewire\Component;

class Tryouts extends Component
{
    public function render()
    {
        // Get Data
        $tryouts = Tryout::where('is_together','basic')->get();

        return view('livewire.user.tryouts', compact('tryouts'));
    }
}
