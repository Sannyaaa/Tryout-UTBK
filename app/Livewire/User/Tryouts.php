<?php

namespace App\Livewire\User;

use App\Models\Tryout;
use Livewire\Component;

class Tryouts extends Component
{
    public $user;

    public function render()
    {
        // $user = Auth::user();

        // Get Data
        $tryouts = Tryout::where('is_together','basic')->where('is_free','free')->get();

        // $paidTryout = Order::where('user_id',$user->id)->where('payment_status','paid');

        return view('livewire.user.tryouts', compact('tryouts'));
    }
}
