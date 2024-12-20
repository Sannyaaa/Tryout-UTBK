<?php

namespace App\Livewire\User\Tryout;

use App\Models\Order;
use App\Models\Result;
use App\Models\Tryout;
use Livewire\Component;
use App\Models\Question;
use App\Models\sub_categories;

class Instruction extends Component
{
    public $tryoutId;
    public $tryout;
    public $subCategoryId;

    public function mount($tryout, $sub_categories)
    {
        // dd($sub_categories);
        $this->tryoutId = $tryout;
        $this->subCategoryId = $sub_categories;

        $this->tryout = Tryout::findOrFail($this->tryoutId);
        if($this->tryout->is_together == 'basic' AND $this->tryout->is_free == 'paid'){
            $paid = Order::where('user_id', auth()->id())
                ->where('payment_status', 'paid')
                ->with(['package_member','user'])
                ->whereHas('package_member', function($q){
                    // dd($q);
                    $q->where('tryout_id', $this->tryoutId);
                })->first();
                
            if($paid == null){
                session()->flash('message','kamu tidak memiliki akses untuk paket tersebut');

                return redirect()->route('user.my-packages');
            }
        }
    }

    public function render()
    {
        // dd($this->tryoutId);
        $tryout = Tryout::findOrFail($this->tryoutId);
        $subCategory = sub_categories::findOrFail($this->subCategoryId);

        $subCategory->totalQuestion = Question::where('tryout_id',$this->tryoutId)
                                                ->where('sub_categories_id', $subCategory->id)
                                                ->count();

        $subCategory->avgScore = Result::where('tryout_id', $this->tryoutId)
                                        ->where('sub_category_id', $subCategory->id)    
                                        ->avg('score');

        return view('livewire.user.tryout.instruction',[
            'tryout' => $tryout,
            'subCategory' => $subCategory,
        ]);
    }
}
