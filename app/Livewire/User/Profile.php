<?php

namespace App\Livewire\User;

use App\Models\DataUniversitas;
use App\Models\Sekolah;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{

    public $user;
    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        $university = DataUniversitas::all();

        $sekolah = Sekolah::all();

        return view('livewire.user.profile',[
            'user' => $this->user,
            'university' => $university,
            'sekolah' => $sekolah,
        ]);
    }
}
