<?php

namespace App\Livewire\User\Owned\Practice;

use App\Models\ClassBimbel;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\ResultPractice;
use App\Models\QuestionPractice;

class Statistik extends Component
{

    public $averageScore;
    public $result;
    public $resultId;
    public $classBimbel;
    public $userRank;
    public $tryout;
    public $userScore;
    public $allResults;

    public function mount(Request $request){
        $this->resultId = $request->segment(4);
        $this->result = ResultPractice::findOrFail($this->resultId);
        $this->userScore = $this->result->score;
        $this->classBimbel = ClassBimbel::findOrFail($this->result->class_bimbel_id);

        $this->averageScore = ResultPractice::where('class_bimbel_id',$this->classBimbel->id)
                                ->avg('score');

        $this->allResults = ResultPractice::where('class_bimbel_id', $this->classBimbel->id)
                                ->orderByDesc('score')
                                ->get();

        $this->userRank = $this->allResults->search(function($result){
            return $result->id == $this->resultId;
        }) + 1;
    }

    public function render()
    {
        $questions = QuestionPractice::where('class_bimbel_id', $this->classBimbel->id)
                                ->count();

        return view('livewire.user.owned.practice.statistik',[
            'questions' => $questions,
            'averageScore' => $this->averageScore,
            'userRank' => $this->userRank,
            'userScore' => $this->userScore,
            'tryout' => $this->tryout,
            'result' => $this->result,
            'allResults' => $this->allResults,
        ]);
    }
}
