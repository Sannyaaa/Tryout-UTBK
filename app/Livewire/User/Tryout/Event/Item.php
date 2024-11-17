<?php

namespace App\Livewire\User\Tryout\Event;

use App\Models\User;
use App\Models\Result;
use App\Models\Tryout;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Item extends Component
{
    public $tryoutId;

    public $tryout;

    public $user;

    public function mount(Request $request) {
        $this->tryoutId = $request->segment(4);

        $this->tryout = Tryout::where('id', $this->tryoutId)->first();

        $this->user = auth()->user();
    }

    public function render()
    {
        $categories = Category::with('sub_categories')->get();

        $totalSubCategories = DB::table('sub_categories')->count();
        
        $filterFirst = DB::table('results')
                ->join('users', 'results.user_id', '=', 'users.id')
                ->join('sub_categories', 'results.sub_category_id', '=', 'sub_categories.id')
                ->select(
                    'results.user_id',
                    'users.name as user_name',
                    'results.tryout_id',
                    DB::raw('SUM(results.score) as total_score'),
                    DB::raw('GROUP_CONCAT(CONCAT(sub_categories.name, ":", results.score) ORDER BY sub_categories.name) as sub_scores')
                )
                ->where('results.tryout_id', $this->tryoutId)
                ->where(function ($query) {
                    $query->where('users.data_universitas_id', $this->user->data_universitas_id)
                        ->orWhere('users.second_data_universitas_id', $this->user->data_universitas_id);
                })
                ->groupBy('results.user_id', 'results.tryout_id')
                ->havingRaw('COUNT(DISTINCT results.sub_category_id) = ?', [$totalSubCategories])
                ->orderByDesc('total_score')
                ->get();

        $filterSecond = DB::table('results')
                ->join('users', 'results.user_id', '=', 'users.id')
                ->join('sub_categories', 'results.sub_category_id', '=', 'sub_categories.id')
                ->select(
                    'results.user_id',
                    'users.name as user_name',
                    'results.tryout_id',
                    DB::raw('SUM(results.score) as total_score'),
                    DB::raw('GROUP_CONCAT(CONCAT(sub_categories.name, ":", results.score) ORDER BY sub_categories.name) as sub_scores')
                )
                ->where('results.tryout_id', $this->tryoutId)
                ->where(function ($query) {
                    $query->where('users.data_universitas_id', $this->user->second_data_universitas_id)
                        ->orWhere('users.second_data_universitas_id', $this->user->second_data_universitas_id);
                })
                ->groupBy('results.user_id', 'results.tryout_id')
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
            }
        }

        return view('livewire.user.tryout.item', [
            'categories' => $categories,
            'firstFilters' => $filterFirst,
            'secondFilters' => $filterSecond
        ]); 
    }
}
