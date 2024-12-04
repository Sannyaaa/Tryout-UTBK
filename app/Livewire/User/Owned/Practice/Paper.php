<?php

namespace App\Livewire\User\Owned\Practice;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\QuestionPractice;
use Illuminate\Support\Facades\Auth;
use App\Models\AnswerQuestionPractice;
use App\Models\ClassBimbel;
use App\Models\ResultPractice;

class Paper extends Component
{
    // #[Url]
    public $q;

    public $itemId;
    public $paperId;
    // public $activeItemId;
    // Collections of answers
    public $answers;
    public $questions;
    
    public $class;

    public function mount(Request $request){
        $this->answers = [];

        $this->paperId = $request->segment(4);

        $this->class = ClassBimbel::where('id', Auth::id())->first();
        
        $this->q = QuestionPractice::where('class_bimbel_id', $this->paperId)
            ->min('id');
    }

    public function updatedAnswers($value, $key)
    {
        // Memicu render ulang komponen saat jawaban diupdate
        $this->dispatch('answersUpdated');
    }
    
    public function changeNumber($value)
    {
        $this->q = $value;
    }
    
    public function previousQuestion()
    {
        $currentId = $this->q;
        
        // Dapatkan semua ID pertanyaan yang diurutkan
        $questionIds = $this->questions->pluck('id')->sort()->values()->toArray();
        
        // Temukan posisi current ID dalam array
        $currentPosition = array_search($currentId, $questionIds);
        
        // Jika bukan di posisi pertama, ambil ID sebelumnya
        if ($currentPosition > 0) {
            $this->q = $questionIds[$currentPosition - 1];
        }
    }

    public function nextQuestion()
    {
        $currentId = $this->q;
        
        // Dapatkan semua ID pertanyaan yang diurutkan
        $questionIds = $this->questions->pluck('id')->sort()->values()->toArray();
        
        // Temukan posisi current ID dalam array
        $currentPosition = array_search($currentId, $questionIds);
        
        // Jika bukan di posisi terakhir, ambil ID selanjutnya
        if ($currentPosition < count($questionIds) - 1) {
            $this->q = $questionIds[$currentPosition + 1];
        }
    }
    
    public function isFirstQuestion()
    {
        // Dapatkan ID terkecil dari koleksi pertanyaan
        $firstId = $this->questions->pluck('id')->min();
        return $this->q === $firstId;
    }
    
    public function isLastQuestion()
    {
        // Dapatkan ID terbesar dari koleksi pertanyaan
        $lastId = $this->questions->pluck('id')->max();
        return $this->q === $lastId;
    }

    public function render()
    {
        $question = QuestionPractice::where('class_bimbel_id', $this->paperId)
                ->where('id', $this->q)
                ->with('answer_practice')
                ->first();

        if ($question) {
            $question->count = 1; // Assigning a fixed new ID of 1, or you can assign any other logic
        }
        
        $this->questions = QuestionPractice::where('class_bimbel_id', $this->paperId)
            ->get() 
            ->map(function ($question, $index) {
                // Assign a new ID starting from 1
                $question->count = $index + 1; // Adding 1 to start from 1 instead of 0
                return $question;
        });

        return view('livewire.user.owned.practice.paper',[
            'question' => $question,
            'answers' => $this->answers,
            'paper' => ClassBimbel::where('id',$this->paperId)->get(),
        ]);
    }

    public function submitAnswers() {
        // dd($this->answers);

        $correctAnswers = 0;
        $incorrectAnswers = 0;
        $unanswered = 0;
        $score = 0;

        $result = ResultPractice::create([
            'user_id' => Auth::user()->id,
            'class_bimbel_id' => $this->paperId,
        ]);

        foreach ($this->questions as $question) {
            $questionId = $question->id;
            $userAnswer = $this->answers[$questionId] ?? null; // Use null if no answer is provided

            // Get the correct answer
            $getCorrectAnswer = $question->correct_answer;

            // Determine if the answer is correct, incorrect, or unanswered
            if ($userAnswer !== null) {
                if ($userAnswer === $getCorrectAnswer) {
                    $correctAnswers++;
                    $score += 4;
                } else {
                    $incorrectAnswers++;
                    $score -= 1;
                }
            } else {
                $unanswered++;
            }

            // dd($value);

            AnswerQuestionPractice::create([
                'question_practice_id' => $questionId,
                'user_id' => Auth::user()->id,
                'answer' => $userAnswer,
                'result_practice_id' => $result->id,
            ]);
        }

        // dd($correctAnswers);

        ResultPractice::whereId($result->id)->update([
            'correct_answers' =>  $correctAnswers,
            'incorrect_answers' => $incorrectAnswers,
            'unanswered' => $unanswered,
            'score' => $score,
        ]);

        return redirect()->route('user.my-bimbel.practice.result', $result->id);
    }
}
