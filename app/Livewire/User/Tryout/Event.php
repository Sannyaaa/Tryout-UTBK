<?php

namespace App\Livewire\User\Tryout;

use App\Models\sub_categories;
use App\Models\Tryout;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Event extends Component
{

    public $participant = 0;

    public function render()
    {
        $now = Carbon::today();

        $tryouts = Tryout::where('is_together','together')
                            ->where('is_ready','yes')->get();

        $comingsoon = $tryouts->where('start_date', '>', $now);
        $finished = $tryouts->where('end_date', '<', $now);
        $ongoing = $tryouts->where('start_date', '<=', $now)->where('end_date', '>=', $now)->first();

        $totalCategories = sub_categories::count();

        if($ongoing){
            $this->participant = DB::table('results')
                        ->select('user_id', DB::raw('COUNT(DISTINCT sub_category_id) as completed_categories'))
                        ->join('sub_categories', 'results.sub_category_id', '=', 'sub_categories.id')
                        ->where('results.tryout_id', $ongoing->id)
                        // ->where('results.status', 'completed') // Pastikan kategori diselesaikan
                        ->groupBy('user_id')
                        ->having('completed_categories', '=', $totalCategories)
                        ->count();
        }
                        
        return view('livewire.user.tryout.event', compact('comingsoon','ongoing','finished'));
    }
}
