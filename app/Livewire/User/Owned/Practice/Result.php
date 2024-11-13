<?php

namespace App\Livewire\User\Owned\Practice;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\QuestionPractice;
use App\Models\AnswerQuestionPractice;
use App\Models\ResultPractice;

class Result extends Component
{
    public $q;

    public $resultsId;

    public $question;
    public $questions;

    public $results; 

    public $answers;

    public function mount(Request $request) {
                  
        $this->resultsId = $request->segment(4);
        $this->results = ResultPractice::whereId($this->resultsId)->first();

        // Initialize an empty array for the mapped answers
        $this->answers = [];
        
        // $this->answers = array_merge($this->answers, $this->question->answer->toArray());

        $this->q = QuestionPractice::where('class_bimbel_id', $this->results->class_bimbel_id)
            ->min('id');

        // $this->question = Question::where('id', $this->q)
        //     ->with('answer')
        //     ->first();

        // Check if the question exists
        // if ($this->question) {
        //     // Fetch answers and map them to the desired format
        //     $this->answers = $this->question->answer->map(function($answer, $index) {
        //         // Map the index to the corresponding letter
        //         return [
        //             'key' => $index + 1, // Start from 1
        //             'option' => $answer->option, // Assuming 'option' holds 'a', 'b', etc.
        //             'text' => $answer->text // Assuming 'text' holds the answer text
        //         ];
        //     })->pluck('option', 'key'); // Use pluck to create a key-value pair
        // } else {
        //     $this->answers = []; // Handle case where question is not found
        // }

        
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
        $this->question = QuestionPractice::where('id', $this->q)
            ->with('answer_practice')
            ->first();

        if ($this->question) {
            $this->question->count = 1; // Assigning a fixed new ID of 1, or you can assign any other logic
        }

        $this->questions = QuestionPractice::where('class_bimbel_id', $this->results->class_bimbel_id)
            ->get()
            ->map(function ($question, $index) {
                // Assign a new count starting from 1
                $question->count = $index + 1; // Adding 1 to start from 1 instead of 0
                return $question; // Return the modified question
        });

        // Handle case where no questions are found
        if ($this->questions->isEmpty()) {
            // Handle the case appropriately (e.g., set a message or redirect)
            // For example:
            session()->flash('message', 'No questions found for this tryout.');
            return; // Early return or handle as needed
        }

        // $question = $this->question;
        // if ($question) {
        //     $this->answers = $question->answers; // Assign answers to the public property
        //     $question->count = 1; // Assigning a fixed new ID of 1, or you can assign any other logic
        // } else {
        //     $this->answers = []; // Initialize as an empty array if no question found
        // }

        
        $answerQuestions = AnswerQuestionPractice::where('result_practice_id', $this->resultsId)->get();
        $this->answers = $answerQuestions->mapWithKeys(function ($answerQuestion, $index) {
            // Fetch the related Question model
            // $question = $answerQuestion->question_practice;
            
            // Map the question ID to the corresponding answer
            // return [$question->id => $answerQuestion->answer_practice];

            return [$answerQuestion->question_practice_id => $answerQuestion->answer_practice];
        })->toArray(); // Use mapWithKeys to create a key-value pair

        $totalQuestions = $this->questions->count();

        return view('livewire.user.owned.practice.result',[
            'totalQuestions' => $totalQuestions,
        ]);
    }
}
