<?php

namespace App\Livewire\User\Package;

use Livewire\Component;
use App\Models\Promotion;
use App\Models\ComponentPage;
use App\Models\Package_member;

class All extends Component
{
    public $selectedType = 'all';
    public $component;
    
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

        $promotions = Promotion::all();

        $component = ComponentPage::first();

        return view('livewire.user.package.all', compact( 'packages','promotions','component'));
    }
}
