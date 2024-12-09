<?php

namespace App\Livewire\User\Tryout\Event;

use App\Models\Result;
use Livewire\Component;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\AnswerQuestion;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class Results extends Component
{
    public $resultId;
    public $q;
    public $questions;
    public $result;
    public $totalResult;
    public $userAnswers = [];
    public $answeredQuestions = [];
    public $averageScore;
    public $userRank;
    public $chartData;
    public $currentQuestionNumber; 
    public $currentQuestionId;

    protected $updatesQueryString = ['q'];

    public function mount(Request $request) 
    {
        $resultId = $request->segment(4);
        $this->resultId = $resultId;
        $this->result = Result::findOrFail($resultId);
        
        // Load questions dan simpan sebagai collection
        $this->questions = collect(Question::where('tryout_id', $this->result->tryout_id)
            ->where('sub_categories_id', $this->result->sub_category_id)
            ->get()
            ->map(function ($question, $index) {
                $question->count = $index + 1;
                return $question;
            }));
            
        // Set initial question
        $this->q = $this->questions->first()->id;
        $this->currentQuestionId = $this->q;
        $this->updateCurrentQuestionNumber();
        
        // Load user answers dengan eager loading
        $answers = AnswerQuestion::with('question')
            ->where('result_id', $this->resultId)
            ->get();
            
        foreach ($answers as $answer) {
            $this->userAnswers[$answer->question_id] = $answer->answer;
            
            // Check if answer is correct
            if ($answer->answer === null) {
                $this->answeredQuestions[$answer->question_id] = null;
            } else {
                $this->answeredQuestions[$answer->question_id] = 
                    $answer->answer === $answer->question->correct_answer;
            }
        }

        $this->calculateAverageScore();
        $this->determineUserRank();
        $this->prepareChartData();
    }

    public function calculateAverageScore(){
        $this->averageScore = Result::where('tryout_id',$this->result->tryout_id)
                                ->where('sub_category_id', $this->result->sub_category_id)
                                ->avg('score');
    }

    public function determineUserRank(){
        $allResults = Result::where('tryout_id', $this->result->tryout_id)
                                ->where('sub_category_id', $this->result->sub_category_id)
                                ->orderByDesc('score')
                                ->get();

        $this->userRank = $allResults->search(function($result){
            return $result->id == $this->resultId;
        }) + 1;
    }

    public function prepareChartData(){
        $allResults = Result::where('tryout_id', $this->result->tryout_id)
            ->where('sub_category_id', $this->result->sub_category_id)
            ->pluck('score')
            ->toArray();

        $this->chartData = json_encode($allResults);
    }

    private function updateCurrentQuestionNumber()
    {
        $currentQuestion = $this->questions->firstWhere('id', $this->q);
        $this->currentQuestionNumber = $currentQuestion ? $currentQuestion->count : 1;
    }

    public function changeNumber($id)
    {
        $question = $this->questions->firstWhere('id', $id);
        
        if ($question) {
            $this->q = $id;
            $this->currentQuestionId = $id;
            $this->updateCurrentQuestionNumber();
            // Emit event untuk update UI
            $this->dispatch('questionChanged', count: $question->count);
        }
    }

    public function previousQuestion()
    {
        $currentId = $this->q;
        $questionIds = $this->questions->pluck('id')->sort()->values()->toArray();
        $currentPosition = array_search($currentId, $questionIds);
        
        if ($currentPosition > 0) {
            $this->q = $questionIds[$currentPosition - 1];
            $this->currentQuestionId = $this->q;
            $this->updateCurrentQuestionNumber();
        }
    }

    public function nextQuestion()
    {
        $currentId = $this->q;
        $questionIds = $this->questions->pluck('id')->sort()->values()->toArray();
        $currentPosition = array_search($currentId, $questionIds);
        
        if ($currentPosition < count($questionIds) - 1) {
            $this->q = $questionIds[$currentPosition + 1];
            $this->currentQuestionId = $this->q;
            $this->updateCurrentQuestionNumber();
        }
    }

    public function isFirstQuestion()
    {
        return $this->q === $this->questions->pluck('id')->min();
    }
    
    public function isLastQuestion()
    {
        return $this->q === $this->questions->pluck('id')->max();
    }

    public function updating($name, $value)
    {
        if ($name === 'q') {
            // Validate question exists
            if (!$this->questions->contains('id', $value)) {
                return false;
            }
        }
    }

    public function render()
    {
        $question = Question::where('id', $this->q)
            ->with('answer')
            ->first();

        $this->totalResult = Result::where('tryout_id',$this->result->tryout_id)
                            ->where('sub_category_id', $this->result->sub_category_id)
                            ->get();

        // Pastikan questions terdefinisi
        if (!isset($this->questions)) {
            $this->questions = collect(Question::where('tryout_id', $this->result->tryout_id)
                ->where('sub_categories_id', $this->result->sub_category_id)
                ->get()
                ->map(function ($q, $index) {
                    $q->count = $index + 1;
                    return $q;
                }));
        }

        $chart = LarapexChart::setType('bar')
        ->setXAxis(['Rata-Rata', 'Nilai Anda'])
        ->setDataset([
            [
                'name' => 'Rata-Rata',
                'data' => [$this->averageScore]
            ],
            [
                'name' => 'Nilai Anda',
                'data' => [$this->result->score]
            ]
        ])
        ->setColors(['#60a5fa', '#0ea5e9']); 

        return view('livewire.user.tryout.results', [
            'question' => $question,
            'questions' => $this->questions,
            'paper' => $question->subCategory,
            // 'tryout' => $question->tryout,
            // 'userAnswers' => $this->userAnswers,
            'chartData' => $this->chartData,
            'averageScore' => $this->averageScore,
            'userRank' => $this->userRank,
            'chart' => $chart,
        ]);
    }
}
