<?php

namespace App\Livewire\User\Owned;

use App\Models\Bimbel;
use App\Models\ClassBimbel;
use App\Models\Package_member;
use App\Models\sub_categories;
use App\Models\Testimonial;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Bimbels extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $bimbel;
    public $package;
    public $content;
    public $subCategories;

    #[Url(history: true)]
    public $selectedSubCategory = '';
    
    #[Url(history: true)]
    public $search = '';

    public function mount($id)
    {
        $this->package = Package_member::findOrFail($id);
        $this->bimbel = Bimbel::findOrFail($this->package->bimbel_id);
        $this->subCategories = sub_categories::all();
    }

    public function saveTestimonial()
    {
        $this->validate([
            'content' => 'required|string|max:500',
        ]);
        
        $testi = Testimonial::create([
            'package_member_id' => $this->package->id,
            'user_id' => auth()->id(),
            'content' => $this->content,
        ]);

        $this->content = '';
        // $this->dispatchBrowserEvent('close-modal', ['modalId' => 'bimbel-testimonial-modal']);
    }

    // Ubah method updating menjadi updated
    public function updated($name)
    {
        if(in_array($name, ['search', 'selectedSubCategory'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $query = ClassBimbel::query()
            ->where('bimbel_id', $this->bimbel->id)
            ->orderBy('date');
        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'LIKE', '%'. $this->search. '%')
                  ->orWhere('date', 'LIKE', '%'. $this->search. '%');
            });
        }

        if ($this->selectedSubCategory) {
            $query->where('sub_categories_id', $this->selectedSubCategory);
        }

        $queryClass = $query->paginate(10);

        $now = Carbon::now();

        return view('livewire.user.owned.bimbels', [
            'queryClass' => $queryClass,
            'bimbel' => $this->bimbel,
            'subCategories' => $this->subCategories,
            'now' => $now
        ]);
    }
}