<?php

namespace App\Livewire\User\Tryout;

use App\Models\Result;
use App\Models\Tryout;
use App\Models\Question;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Item extends Component
{
    public $tryoutId;

    public $tryout;

    public $user;

    public function mount(Request $request) {
        $this->tryoutId = $request->segment(3);

        $this->tryout = Tryout::where('id', $this->tryoutId)->first();

        $this->user = auth()->user();
    }

    public function render()
    {
        $categories = Category::with('sub_categories')->get();

        $totalSubCategories = DB::table('sub_categories')->count();
        
        $filterFirst = Result::select('user_id', DB::raw('SUM(score) as total_score'))
            ->join('users', 'results.user_id', '=', 'users.id')
            ->where('users.data_universitas_id', $this->user->second_data_universitas_id)
            ->where('users.second_data_universitas_id', $this->user->data_universitas_id)
            ->where('results.tryout_id', $this->tryoutId)
            ->groupBy('results.user_id')
            ->havingRaw('COUNT(DISTINCT results.sub_category_id) = ?', [$totalSubCategories])
            ->orderByDesc('total_score')
            ->get();


        // Cek setiap sub-category yang sudah pernah dikerjakan user
        foreach ($categories as $category) {
            foreach ($category->sub_categories as $subCategory) {
                $subCategory->is_completed = Result::where('tryout_id',$this->tryoutId)
                                                ->where('sub_category_id', $subCategory->id)
                                                ->where('user_id', $this->user->id)
                                                ->first();
                $subCategory->totalQuestion = Question::where('tryout_id',$this->tryoutId)
                                                ->where('sub_categories_id', $subCategory->id)
                                                ->count();
            }
        }

        return view('livewire.user.tryout.item', [
            'categories' => $categories,
            'firstFilters' => $filterFirst
        ]); 
    }
}
