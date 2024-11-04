<?php

namespace App\Livewire\User\Tryout;

use App\Models\Question;
use App\Models\sub_categories;
use Illuminate\Http\Request;
use Livewire\Attributes\Url;
use Livewire\Component;

class Paper extends Component
{
    #[Url]
    public $q;

    public $item_id;

    public $paper_id;

    public function mount(Request $request){
        $this->item_id = $request->segment(4);
        
        $this->paper_id = $request->segment(5);
        // dd($id);
    }
    public function render()
    {
        $question = $this->q ? Question::where('tryout_id', $this->item_id)->where('sub_categories_id', $this->paper_id)->where('id', $this->q)->first() : null;
        if ($question) {
            $question->count = 1; // Assigning a fixed new ID of 1, or you can assign any other logic
        }
        // dd($question);

        $paper = sub_categories::where('id', $this->paper_id)->first();

        $questions = $this->q ? Question::where('tryout_id', $this->item_id)->where('sub_categories_id', $this->paper_id)
        ->get() 
        ->map(function ($question, $index) {
            // Assign a new ID starting from 1
            $question->count = $index + 1; // Adding 1 to start from 1 instead of 0
            return $question;
        }) : null;

        // dd($questions);
        return view('livewire.user.tryout.paper', compact('question', 'questions', 'paper'));
    }

}
