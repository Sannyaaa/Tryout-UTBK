<?php

namespace App\Livewire\User\Owned\Practice;

use App\Models\Order;
use Livewire\Component;
use App\Models\ClassBimbel;
use Illuminate\Http\Request;
use App\Models\ResultPractice;

class History extends Component
{
    public $bimbelId;
    public $package;
    public $classBimbel;

    public $results;

    public function mount(Request $request){
        $this->classBimbel = ClassBimbel::findOrFail($request->segment(4));

        $paid = Order::where('user_id', auth()->id())
            ->where('payment_status', 'paid')
            ->with(['package_member','user'])
            ->whereHas('package_member', function($q){
                // dd($q);
                $q->where('bimbel_id', $this->classBimbel->bimbel_id);
            })->first();

        if($paid == null){
            session()->flash('message','kamu tidak memiliki akses untuk paket tersebut');

            return redirect()->route('user.my-packages');
        }

        $this->package = $paid->package_member;

        $this->bimbelId = $this->classBimbel->bimbel_id;

        $this->results = ResultPractice::where('class_bimbel_id',$this->classBimbel->id)
                            ->where('user_id', auth()->id())
                            ->get();
    }

    public function render()
    {
        return view('livewire.user.owned.practice.history');
    }
}
