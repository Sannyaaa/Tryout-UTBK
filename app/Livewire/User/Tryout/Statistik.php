<?php

namespace App\Livewire\User\Tryout;

use App\Models\Question;
use App\Models\Result;
use App\Models\Tryout;
use Illuminate\Http\Request;
use Livewire\Component;

class Statistik extends Component
{

    public $averageScore;
    public $result;
    public $resultId;
    public $userRank;
    public $tryout;
    public $userScore;

    public function mount(Request $request){
        $this->resultId = $request->segment(3);
        $this->result = Result::findOrFail($this->resultId);
        $this->tryout = Tryout::findOrFail($this->result->tryout_id);
        $this->userScore = $this->result->score;

        $this->averageScore = Result::where('tryout_id',$this->result->tryout_id)
                                ->where('sub_category_id', $this->result->sub_category_id)
                                ->avg('score');

        $allResults = Result::where('tryout_id', $this->result->tryout_id)
                                ->where('sub_category_id', $this->result->sub_category_id)
                                ->orderByDesc('score')
                                ->get();

        $this->userRank = $allResults->search(function($result){
            return $result->id == $this->resultId;
        }) + 1;
    }

    public function render()
    {
        $questions = Question::where('tryout_id', $this->result->tryout_id)
                                ->where('sub_categories_id', $this->result->sub_category_id)
                                ->count();

        return view('livewire.user.tryout.statistik',[
            'questions' => $questions,
            'averageScore' => $this->averageScore,
            'userRank' => $this->userRank,
            'userScore' => $this->userScore,
            'tryout' => $this->tryout,
            'result' => $this->result,
        ]);
    }
}
