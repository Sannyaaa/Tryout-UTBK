<?php

namespace App\Livewire\User\Tryout;

use App\Models\AnswerQuestion;
use App\Models\Question;
use App\Models\Result;
use App\Models\sub_categories;
use App\Models\Tryout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Collection;
use Livewire\Attributes\Url;
use Livewire\Component;

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
    

    public function mount(Request $request){
        $this->answers = [];
        
        $this->itemId = $request->segment(3);
        $this->paperId = $request->segment(4);
        
        $this->q = Question::where('tryout_id', $this->itemId)
            ->where('sub_categories_id', $this->paperId)
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
        $question = Question::where('tryout_id', $this->itemId)
                ->where('sub_categories_id', $this->paperId)
                ->where('id', $this->q)
                ->with('answer')
                ->first();
                
        if ($question) {
            $question->count = 1; // Assigning a fixed new ID of 1, or you can assign any other logic
        }
    

        $this->questions = Question::where('tryout_id', $this->itemId)
            ->where('sub_categories_id', $this->paperId)
            ->get() 
            ->map(function ($question, $index) {
                // Assign a new ID starting from 1
                $question->count = $index + 1; // Adding 1 to start from 1 instead of 0
                return $question;
        });
        
    
        return view('livewire.user.tryout.paper', [
            'question' => $question,
            'paper' => sub_categories::where('id', $this->paperId)->first(),
            'tryout' => Tryout::where('id',$this->itemId)->first(),
        ]);
    }

    public function submitAnswers() {
        // dd($this->answers);

        $correctAnswers = 0;
        $incorrectAnswers = 0;
        $unanswered = 0;
        $score = 0;

        $result = Result::create([
            'user_id' => Auth::user()->id,
            'tryout_id' => $this->itemId,
            'sub_category_id' => $this->paperId,
        ]);

        // Loop through each question
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

            // Save the answer to the database, even if it's null
            AnswerQuestion::create([
                'question_id' => $questionId,
                'user_id' => Auth::user()->id,
                'answer' => $userAnswer,
                'result_id' => $result->id,
            ]);
        }

        Result::whereId($result->id)->update([
            'correct_answers' =>  $correctAnswers,
            'incorrect_answers' => $incorrectAnswers,
            'unanswered' => $unanswered,
            'score' => $score,
        ]);

        $tryout = Tryout::where('id', $this->itemId)->first();

        if ($tryout->is_together == 'together') {
            return redirect()->route('user.tryouts.event.item', $result->tryout_id);
        } else {
            return redirect()->route('user.tryouts.results', $result->id);
        }
        
    }
}
