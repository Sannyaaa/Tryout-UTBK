<?php

namespace App\Livewire\User\Owned;

use App\Models\ClassBimbel;
use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class All extends Component
{
    public $selectedType = 'all';
    
    public function render()
    {
        $query = Order::where('user_id', auth()->id())
            ->where('payment_status', 'paid')
            ->with(['package_member','user']);

        // Filter berdasarkan tipe paket
        if ($this->selectedType !== 'all') {
            $query->whereHas('package_member', function($q) {
                if ($this->selectedType === 'tryout') {
                    $q->whereNotNull('tryout_id');
                } else if ($this->selectedType === 'bimbel') {
                    $q->whereNull('tryout_id');
                }
            });
        }

        $todayClasses = ClassBimbel::whereHas('bimbel.package_member.orders', function ($query) {
            $query->where('user_id', auth()->id())
                ->where('payment_status', 'paid');
        })
        ->where('date', Carbon::today())
        ->get();

        $purchasedPackages = $query->get()
            ->map(function($order) {
                return $order->package_member;
            })
            ->filter() // Menghilangkan nilai null jika ada
            ->values(); // Reset index array

        return view('livewire.user.owned.all', [
            'purchasedPackages' => $purchasedPackages,
            'todayClasses' => $todayClasses,
        ]);
    }
}
