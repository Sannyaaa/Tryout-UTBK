<?php

namespace App\Livewire\User;

use App\Models\Order;
use App\Models\Tryout;
use Livewire\Component;
use App\Models\Package_member;
use Illuminate\Support\Facades\Auth;

class Tryouts extends Component
{
    public $user;

    public function render()
    {
        $user = Auth::user();

        // Get Data
        $tryouts = Tryout::where('is_together','basic')
                            ->where('is_free','free')
                            ->get();

        $paidTryout = Tryout::whereHas('package_member', function ($query) {
                            $query->whereHas('orders', function ($subQuery) {
                                $subQuery->where('payment_status', 'paid')
                                ->where('user_id', Auth::id());
                            });
                        })
                        ->where('is_together', 'basic') // Kondisi "tidak serentak"
                        ->get();

        // dd($paidTryout);
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
            'paidTryout' => $paidTryout, // Add this line to pass the paid tryout data to the view
        ]);
    }
}
