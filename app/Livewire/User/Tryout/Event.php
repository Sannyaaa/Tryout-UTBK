<?php

namespace App\Livewire\User\Tryout;
use App\Models\Tryout;
use Carbon\Carbon;
use Livewire\Component;

class Event extends Component
{
    public function render()
    {
        $now = Carbon::today();

        $tryouts = Tryout::where('is_together','together')
                            ->where('is_ready','yes')->get();

        $comingsoon = $tryouts->where('start_date', '>', $now);
        $finished = $tryouts->where('end_date', '<', $now);
        $ongoing = $tryouts->where('start_date', '<=', $now)->where('end_date', '>=', $now);

        return view('livewire.user.tryout.event', compact('comingsoon','ongoing','finished'));
    }
}
