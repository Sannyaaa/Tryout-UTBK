<?php

namespace App\Livewire\User;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Transaction extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    #[Url(history: true)]
    public $paymentStatus = '';
    
    #[Url(history: true)]
    public $search = '';

    // public function mount($id)
    // {
    //     $this->transactions = Order::with('package_member')->where('user_id', auth()->id())->get();
    // }

    // Ubah method updating menjadi updated
    public function updated($name)
    {
        if(in_array($name, ['search', 'paymentStatus'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $query = Order::with('package_member')
            ->where('user_id', auth()->id())
            ->orderByDesc('created_at');
        
        if ($this->search) {
            $query->where(function($q) {
                $q->where('invoice', 'LIKE', '%'. $this->search. '%')
                    ->orWhere('final_price', 'LIKE', '%'. $this->search. '%');
            });
        }

        if ($this->paymentStatus) {
            $query->where('payment_status', $this->paymentStatus);
        }

        $now = Carbon::now();

        DB::table('orders')
        ->where('payment_status','pending')
        ->where('created_at', '<', $now->subHours(24))
        ->update(['payment_status' => 'cancel']);
        
        return view('livewire.user.transaction',[
            'transactions' => $query->paginate(10),
        ]);
    }
}
