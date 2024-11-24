<?php

namespace App\Livewire\User;

use App\Models\Package_member;
use App\Models\Tryout;
use Livewire\Component;

class Tryouts extends Component
{
    public $user;

    public function render()
    {
        // $user = Auth::user();

        // Get Data
        $tryouts = Tryout::where('is_together','basic')
                            ->where('is_free','free')
                            ->where('is_ready','yes')
                            ->get();

        // $paidTryout = Order::where('user_id',$user->id)->where('payment_status','paid');

        $packages = Package_member::with(['benefits','tryout'])
            // ->whereHas('tryout', function($query){
            //         return $query->where('is_together','basic');
            //     })
            ->whereHas('tryout', function($query){
                return $query->where('is_together','basic');
            })
            ->orderByDesc('created_at')
            ->get();

        return view('livewire.user.tryouts', [
            'tryouts' => $tryouts,
            'packages' => $packages,
            'user' => $this->user, // Add this line to pass the user data to the view
        ]);
    }
}
