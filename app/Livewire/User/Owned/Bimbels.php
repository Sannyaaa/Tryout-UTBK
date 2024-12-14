<?php

namespace App\Livewire\User\Owned;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Bimbel;
use Livewire\Component;
use App\Models\ClassBimbel;
use App\Models\Testimonial;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\Package_member;
use App\Models\ResultPractice;
use App\Models\sub_categories;

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

        $paid = Order::where('user_id', auth()->id())
            ->where('payment_status', 'paid')
            ->with(['package_member','user'])
            ->whereHas('package_member', function($q){
                // dd($q);
                $q->where('bimbel_id', $this->package->bimbel_id);
            })->first();
            
        if($paid == null){
            session()->flash('message','kamu tidak memiliki akses untuk paket tersebut');

            return redirect()->route('user.my-packages');
        }
    }

    public function saveTestimonial()
    {
        // dd($this->content);
        $this->validate([
            'content' => 'required|string|max:500',
        ]);
        
        $testi = Testimonial::create([
            'package_member_id' => $this->package->id,
            'user_id' => auth()->id(),
            'content' => $this->content,
        ]);

        // Reset form
        $this->reset('content');

        // Dispatch JavaScript event
        // $this->dispatch('testimonial-saved');
        $this->dispatch('close-modal');
        
        // Kirim flash message
        session()->flash('message', 'Testimoni berhasil ditambahkan!');
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

        foreach($queryClass as $item){
            $item->is_completed = ResultPractice::where('class_bimbel_id',$item->id)
                    ->where('user_id',auth()->id())
                    ->exists();
        }

        $now = Carbon::now();

        return view('livewire.user.owned.bimbels', [
            'queryClass' => $queryClass,
            'bimbel' => $this->bimbel,
            'subCategories' => $this->subCategories,
            'now' => $now
        ]);
    }
}