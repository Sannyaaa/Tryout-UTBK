<?php

namespace App\Livewire\User\Owned\Practice;

use App\Models\ClassBimbel;
use App\Models\ResultPractice;
use Illuminate\Http\Request;
use Livewire\Component;

class History extends Component
{
    public $bimbelId;

    public $classBimbel;

    public $results;

    public function mount(Request $request){
        $this->classBimbel = ClassBimbel::findOrFail($request->segment(4));

        // dd($this->classBimbel->bimbel_id);

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
