<?php

namespace App\Livewire\User\Tryout;

use App\Models\sub_categories;
use Livewire\Component;
use App\Models\Tryout;
use App\Models\Result;
use App\Models\Question;

class Instruction extends Component
{
    public $tryoutId;

    public $subCategoryId;

    public function mount($tryout, $sub_categories)
    {
        // dd($sub_categories);
        $this->tryoutId = $tryout;
        $this->subCategoryId = $sub_categories;
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
