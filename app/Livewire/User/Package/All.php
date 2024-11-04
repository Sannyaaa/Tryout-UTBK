<?php

namespace App\Livewire\User\Package;

use App\Models\Package_member;
use Livewire\Component;

class All extends Component
{
    public function render()
    {
        $packages = Package_member::with('benefits')->get();

        return view('livewire.user.package.all', compact( 'packages'));
    }
}
