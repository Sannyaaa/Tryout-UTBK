<?php

namespace App\Livewire\User\Tryout\Event;

use App\Models\User;
use App\Models\Order;
use App\Models\Result;
use App\Models\Tryout;
use Livewire\Component;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Item extends Component
{
    use WithPagination;

    public $tryoutId;
    public $tryout;
    public $user;

    #[Url(history: true)]
    public $search = '';
    public $perPage = 1;
    public $activeTab = 'first';

    protected $listeners = ['refresh' => '$refresh'];

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 1],
        'activeTab' => ['except' => 'first']
    ];

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function updated($name)
    {
        if(in_array($name, ['search', 'selectedSubCategory'])) {
            $this->resetPage();
        }
    }

    public function mount(Request $request) {
        $this->tryoutId = $request->segment(4);
        $this->tryout = Tryout::where('id', $this->tryoutId)->first();
        $this->user = auth()->user();
    }

    public function render()
    {
        $categories = Category::with('sub_categories')->get();
        $totalSubCategories = DB::table('sub_categories')->count();
        $questions = Question::where('tryout_id', $this->tryoutId)->count();
        
        $baseQuery = DB::table('results')
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
            ->when($this->search !== '', function($query) {
                $query->where('users.name', 'LIKE', '%' . $this->search . '%');
            })
            ->groupBy('results.user_id', 'results.tryout_id')
            ->havingRaw('COUNT(DISTINCT results.sub_category_id) = ?', [$totalSubCategories])
            ->orderByDesc('total_score');

        $filterFirst = clone $baseQuery;
        $filterFirst = $filterFirst->where(function ($query) {
                $query->where('users.data_universitas_id', $this->user->data_universitas_id)
                    ->orWhere('users.second_data_universitas_id', $this->user->data_universitas_id);
            })
            ->paginate($this->perPage);

        $firstUserRank = null;
        $firstRank = 1;

        foreach ($filterFirst as $user) {
            if ($user->user_id == $this->user->id) {
                // Pecah sub_scores menjadi array
                $subScores = explode(',', $user->sub_scores);

                // Loop untuk mendapatkan subkategori dan nilainya
                $userSubCategories = [];
                foreach ($subScores as $subScore) {
                    list($subCategoryName, $score) = explode(':', $subScore);
                    $userSubCategories[] = [
                        'sub_category' => $subCategoryName,
                        'score' => $score
                    ];
                }

                // Masukkan informasi tentang subkategori ke dalam array
                $firstUserRank = [
                    'rank' => $firstRank,
                    'user_id' => $user->user_id,
                    'user_name' => $user->user_name,
                    'total_score' => $user->total_score,
                    'sub_categories' => $userSubCategories // Menyertakan subkategori yang sudah diproses
                ];
                break; // Keluar dari loop jika user ditemukan
            }
            $firstRank++;
        }

        $filterSecond = clone $baseQuery;
        $filterSecond = $filterSecond->where(function ($query) {
                $query->where('users.data_universitas_id', $this->user->second_data_universitas_id)
                    ->orWhere('users.second_data_universitas_id', $this->user->second_data_universitas_id);
            })
            ->paginate($this->perPage);

        $secondUserRank = null;
        $secondRank = 1;

        foreach ($filterSecond as $user) {
            if ($user->user_id == $this->user->id) {
                // Pecah sub_scores menjadi array
                $subScores = explode(',', $user->sub_scores);

                // Loop untuk mendapatkan subkategori dan nilainya
                $userSubCategories = [];
                foreach ($subScores as $subScore) {
                    list($subCategoryName, $score) = explode(':', $subScore);
                    $userSubCategories[] = [
                        'sub_category' => $subCategoryName,
                        'score' => $score
                    ];
                }

                // Masukkan informasi tentang subkategori ke dalam array
                $secondUserRank = [
                    'rank' => $secondRank,
                    'user_id' => $user->user_id,
                    'user_name' => $user->user_name,
                    'total_score' => $user->total_score,
                    'sub_categories' => $userSubCategories // Menyertakan subkategori yang sudah diproses
                ];
                break; // Keluar dari loop jika user ditemukan
            }
            $secondRank++;
        }


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

        $results = DB::table('results')
                ->join('sub_categories', 'results.sub_category_id', '=', 'sub_categories.id')
                ->select(
                    'results.sub_category_id',
                    'sub_categories.name as sub_category_name',
                    DB::raw('(SELECT AVG(r.score) 
                            FROM results r 
                            WHERE r.sub_category_id = results.sub_category_id 
                                AND r.tryout_id = results.tryout_id) as avg_score'),
                    DB::raw('MAX(results.score) as max_score'),
                    DB::raw('SUM(results.correct_answers) as total_correct'),
                    DB::raw('SUM(results.incorrect_answers) as total_incorrect'),
                    DB::raw('SUM(results.unanswered) as total_unanswered'),
                    DB::raw('(SELECT COUNT(*) 
                            FROM questions 
                            WHERE questions.tryout_id = results.tryout_id 
                                AND questions.sub_categories_id = results.sub_category_id) as total_questions')
                )
                ->where('results.user_id', $this->user->id)
                ->where('results.tryout_id', $this->tryoutId)
                ->groupBy('results.sub_category_id', 'results.tryout_id', 'sub_categories.name')
                ->get();

        // $totalScore = $firstUserRank['total_score'] != null ? $secondUserRank['total_score'] : '';

        $isPaid = Order::whereHas('package_member', function($query){
                    return $query->where('tryout_id',$this->tryoutId);
                })->where('user_id', $this->user->id)
                ->where('payment_status','paid')->get();

        return view('livewire.user.tryout.item', [
            'categories' => $categories,
            'firstFilters' => $filterFirst,
            'secondFilters' => $filterSecond,
            // 'universities' => $universities,
            'firstRank' => $firstUserRank,
            'secondRank' => $secondUserRank,
            'isPaid' => $isPaid,
            'tryout' => $this->tryout,
            'questions' => $questions,
            'results' => $results,
            // 'totalScore' => $totalScore,
            // 'activeTab' => $this->activeTab,
            // 'totalSubCategories' => $totalSubCategories,
            // 'isCompleted' => $subCategory->is_completed,
            // 'totalQuestion' => $subCategory->totalQuestion,
        ]); 
    }
}
