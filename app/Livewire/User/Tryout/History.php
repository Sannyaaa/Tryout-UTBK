<?php

namespace App\Livewire\User\Tryout;

use App\Models\Result;
use Livewire\Component;

class History extends Component
{
    public $tryoutId;
    public $subCategoryId;
    public $history;

    // Fungsi ini akan dijalankan saat komponen di-mount
    public function mount($tryout, $sub_categories)
    {
        // dd($sub_categories);
        $this->tryoutId = $tryout;
        $this->subCategoryId = $sub_categories;

        // Ambil riwayat user berdasarkan tryoutId, subCategoryId, dan user yang sedang login
        $this->history = Result::where('tryout_id', $this->tryoutId)
                               ->where('sub_category_id', $this->subCategoryId)
                               ->where('user_id', auth()->id())
                               ->get();
    }

    public function render()
    {
        return view('livewire.user.tryout.history');
    }
}
