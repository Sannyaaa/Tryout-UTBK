<?php

namespace App\Livewire\User;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Tryout;
use Livewire\Component;
use App\Models\Question;
use App\Models\Promotion;
use App\Models\ClassBimbel;
use Illuminate\Http\Request;
use App\Models\Package_member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $user; 

    public $now;

    public $latestTryoutId;

    public $isPaid;

    public function render(Request $request)
    {
        $this->user = Auth::user();
        
        if($this->user->data_universitas_id = null){
            return redirect()->route('user.profile');
        }

        if (session('url-package')) {
            $url = session('url-package');
            return redirect()->route('package.item',$url);
        }

        $this->now = Carbon::now();

        $packages = Package_member::all();

        $myPackages = Order::with(['package_member'])->where('user_id', $this->user->id)
                ->where('payment_status','paid')->get();

        $totalBimbels = Order::whereHas('package_member', function($query){
            return $query->whereNotNull('bimbel_id');
        })->where('user_id', $this->user->id)
                ->where('payment_status','paid')->get();

        $eventTryouts = Tryout::where('start_date', '<=', $this->now)->where('end_date', '>=', $this->now)->get();

        $todayClasses = ClassBimbel::whereHas('bimbel.package_member.orders', function ($query) {
            $query->where('user_id', $this->user->id)
                ->where('payment_status', 'paid');
        })
        ->where('date', Carbon::today())
        ->get();

        $ongoing = Tryout::where('is_together','together')->where('start_date', '<=', $this->now)->where('end_date', '>=', $this->now)->get();

        $totalSubCategories = DB::table('sub_categories')->count();

        $this->latestTryoutId = DB::table('results as r')
            ->join('tryouts as t', 'r.tryout_id', '=', 't.id') // Join ke tabel tryouts
            ->where('t.is_together', 'together') // Filter hanya untuk tryout bertipe 'together'
            ->where('r.user_id', $this->user->id) // Filter untuk user saat ini
            ->groupBy('r.tryout_id')
            ->havingRaw('COUNT(DISTINCT r.sub_category_id) = (SELECT COUNT(DISTINCT sub_category_id) FROM results WHERE tryout_id = r.tryout_id)')
            ->orderByDesc(DB::raw('MAX(r.created_at)')) // Urutkan berdasarkan waktu pengerjaan terbaru
            ->value('r.tryout_id');

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
                ->where('results.tryout_id', $this->latestTryoutId)
                ->groupBy('results.sub_category_id', 'results.tryout_id', 'sub_categories.name')
                ->get();
        
        $filterFirst = DB::table('results')
                ->join('users', 'results.user_id', '=', 'users.id')
                ->join('sub_categories', 'results.sub_category_id', '=', 'sub_categories.id')
                // ->join('tryouts', 'results.tryout_id', '=', 'tryouts.id')
                ->select(
                    'results.user_id',
                    'users.name as user_name',
                    'results.tryout_id',
                    DB::raw('SUM(results.score) as total_score'),
                    DB::raw('GROUP_CONCAT(CONCAT(sub_categories.name, ":", results.score) ORDER BY sub_categories.name) as sub_scores'),
                    // DB::raw('RANK() OVER (ORDER BY SUM(results.score) DESC) as rank') // Menambahkan rank
    
                )
                ->where('results.tryout_id', $this->latestTryoutId)
                ->where(function ($query) {
                    $query->where('users.data_universitas_id', $this->user->data_universitas_id)
                        ->orWhere('users.second_data_universitas_id', $this->user->data_universitas_id);
                })
                ->groupBy('results.user_id', 'results.tryout_id')
                ->havingRaw('COUNT(DISTINCT results.sub_category_id) = ?', [$totalSubCategories])
                ->orderByDesc('total_score')
                ->get();

        $firstUserRank = null;
        $firstRank = 1;

        foreach ($filterFirst as $user) {
            if ($user->user_id == $this->user->id) {
                $firstUserRank = [
                    'rank' => $firstRank,
                    'user_id' => $user->user_id,
                    'user_name' => $user->user_name,
                    'total_score' => $user->total_score
                ];
                break; // Keluar dari loop jika user ditemukan
            }
            $firstRank++;
        }

        $filterSecond = DB::table('results')
                ->join('users', 'results.user_id', '=', 'users.id')
                ->join('sub_categories', 'results.sub_category_id', '=', 'sub_categories.id')
                // ->join('tryouts', 'results.tryout_id', '=', 'tryouts.id')
                ->select(
                    'results.user_id',
                    'users.name as user_name',
                    'results.tryout_id',
                    DB::raw('SUM(results.score) as total_score'),
                    DB::raw('GROUP_CONCAT(CONCAT(sub_categories.name, ":", results.score) ORDER BY sub_categories.name) as sub_scores'),
                    // DB::raw('RANK() OVER (ORDER BY SUM(results.score) DESC) as rank') // Menambahkan rank
                )
                ->where('results.tryout_id', $this->latestTryoutId)
                ->where(function ($query) {
                    $query->where('users.data_universitas_id', $this->user->second_data_universitas_id)
                        ->orWhere('users.second_data_universitas_id', $this->user->second_data_universitas_id);
                })
                ->groupBy('results.user_id', 'results.tryout_id')
                ->havingRaw('COUNT(DISTINCT results.sub_category_id) = ?', [$totalSubCategories])
                ->orderByDesc('total_score')
                ->get();

        $secondUserRank = null;
        $secondRank = 1;

        foreach ($filterSecond as $user) {
            if ($user->user_id == $this->user->id) {
                $secondUserRank = [
                    'rank' => $secondRank,
                    'user_id' => $user->user_id,
                    'user_name' => $user->user_name,
                    'total_score' => $user->total_score
                ];
                break; // Keluar dari loop jika user ditemukan
            }
            $secondRank++;
        }

        // $isPaid = Order::whereHas('package_member', function($query){
        //             return $query->where('tryout_id',$this->latestTryoutId);
        //         })->where('user_id', $this->user->id)
        //         ->where('payment_status','paid')->get();

        // $totalScore = $firstUserRank['total_score'] ?? $secondUserRank['total_score'];

        $questions = Question::where('tryout_id', $this->latestTryoutId)->count();

        // $query = Order::where('user_id', auth()->id())
        //     ->where('payment_status', 'paid')
        //     ->with(['package_member','user']);

        // $query->whereHas('package_member', function($q) {
        //     $q->whereNotNull('bimbel_id');
        // })->take(1);

        // // dd($query);

        $now = Carbon::now();

        $queryClasses = ClassBimbel::whereHas('bimbel.package_member.orders', function ($query) {
            $query->where('user_id', auth()->id())
                ->where('payment_status', 'paid');
        })
        ->where('date', '>', $now)
        ->orderBy('date')
        ->limit(5)
        ->get();

        $transaction = Order::with('package_member')
            ->where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $packages = Package_member::limit(3)->get();

        $promotions = Promotion::where('start_date', '<=', $this->now)->where('end_date', '>=', $this->now)->where('is_show','yes')->get();

        DB::table('orders')
        ->where('payment_status','pending')
        ->where('created_at', '<', $now->subHours(24))
        ->update(['payment_status' => 'cancel']);

        return view('livewire.user.dashboard',[
            'totalPackages' => $packages,
            'totalMyPackages' => $myPackages,
            'totalBimbels' => $totalBimbels,
            'totalEvents' => $eventTryouts,
            'firstFilters' => $filterFirst,
            'secondFilters' => $filterSecond,
            'latestTryoutId' => $this->latestTryoutId,
            'firstRank' => $firstUserRank,
            'secondRank' => $secondUserRank,
            // 'isPaid' => $isPaid,
            'todayClasses' => $todayClasses,
            'ongoing' => $ongoing,
            'results' => $results,
            // 'totalScore' => $totalScore,
            'questions' => $questions,
            'queryClass' => $queryClasses,
            'transactions' => $transaction,
            'packages' => $packages,
            'promotions'=> $promotions,
        ]);
    }
}
