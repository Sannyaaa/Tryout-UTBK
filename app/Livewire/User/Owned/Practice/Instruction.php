<?php

namespace App\Livewire\User\Owned\Practice;

use App\Models\ClassBimbel;
use App\Models\QuestionPractice;
use App\Models\ResultPractice;
use Livewire\Component;

class Instruction extends Component
{
    public $classBimbelId;

    public function mount($class_bimbel)
    {
        // dd($sub_categories);
        $this->classBimbelId = $class_bimbel;
    }

    public function render()
    {
        // dd($this->tryoutId);
        $classBimbel = ClassBimbel::findOrFail($this->classBimbelId);

        $classBimbel->totalQuestion = QuestionPractice::where('class_bimbel_id', $this->classBimbelId)
                                                ->count();

        $classBimbel->avgScore = ResultPractice::where('class_bimbel_id', $this->classBimbelId)
                                        ->avg('score');

        return view('livewire.user.owned.practice.instruction',[
            'class_bimbel' => $classBimbel,
        ]);
    }
}
