<?php

namespace App\Livewire\User\Package;

use App\Models\Package_member;
use Livewire\Component;

class All extends Component
{
    public $selectedType = 'all';
    
    public function render()
    {
        $packages = Package_member::with('benefits')
            ->when($this->selectedType !== 'all', function($query) {
                if ($this->selectedType === 'tryout') {
                    return $query->whereNotNull('tryout_id');
                } else if ($this->selectedType === 'bimbel') {
                    return $query->whereNull('tryout_id');
                }
            })
            ->get();

        return view('livewire.user.package.all', compact( 'packages'));
    }
}
