<?php

namespace App\Livewire\User\Tryout;

use App\Models\AnswerQuestion;
use App\Models\Question;
use App\Models\Result;
use App\Models\sub_categories;
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

    
    public function changeNumber($value)
    {
        $this->q = $value;
    }
    
    public function previousQuestion()
    {
        // Decrement the index if it's greater than 0
        // Get the current question ID
        $currentId = $this->q; 
        $foundPrevious = false; // Flag to indicate if the previous question is found
        
        // Loop through the questions in reverse order to find the previous question with an existing ID
        foreach ($this->questions as $question) {
            if ($question->id < $currentId) {
                $this->q = $question->id; // Update q to the previous existing question ID
                $foundPrevious = true; // Set the flag to true
                break; // Exit the loop once the previous question is found
            }
        }
        
        // Optionally handle the case where no previous question was found
        if (!$foundPrevious) {
            // Handle the case where there is no previous question (e.g., stay at the current one or reset to the last question)
            dd("No previous question found.");
        }
    }

    public function nextQuestion()
    {
        $currentId = $this->q; // Store the current question ID
        $foundNext = false; // Flag to indicate if the next question is found
        
        // Loop through the questions starting from the current index + 1
        foreach ($this->questions as $question) {
            if ($question->id > $currentId) {
                $this->q = $question->id; // Update q to the next existing question ID
                $foundNext = true; // Set the flag to true
                break; // Exit the loop once the next question is found
            }
        }
        
        // Optionally handle the case where no next question was found
        if (!$foundNext) {
            // Handle the case where there is no next question (e.g., reset to the first question or stay at the current one)
            dd("the end");
        }
    }
    
    public function isFirstQuestion()
    {
        return $this->q === $this->questions->first()->id;
    }
    
    public function isLastQuestion()
    {
        return $this->q === $this->questions->last()->id;
    }

    public function render()
    {
        $question = Question::where('tryout_id', $this->itemId)
                ->where('sub_categories_id', $this->paperId)
                ->where('id', $this->q)
                ->with('answer')
                ->first();
                
        // dd($question->answer);
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
            'paper' => sub_categories::where('id', $this->paperId)->first()
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

        foreach ($this->answers as $key => $value) {
            $getCorrectAnswer = Question::whereId($key)->first()->correct_answer;

            if ($value == $getCorrectAnswer) {
                $correctAnswers++;
                $score += 4;
            } elseif ($value == null) {
                $unanswered++;
            } else {
                $incorrectAnswers++;
                $score -= 1;
            }

            AnswerQuestion::create([
                'question_id' => $key,
                'user_id' => Auth::user()->id,
                'answer' => $value,
                'result_id' => $result->id,
            ]);
        }

        Result::whereId($result->id)->update([
            'correct_answers' =>  $correctAnswers,
            'incorrect_answers' => $incorrectAnswers,
            'unanswered' => $unanswered,
            'score' => $score,
        ]);

        return redirect()->route('user.tryouts.results', $result->id);
    }
}
