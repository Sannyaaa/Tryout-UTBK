<?php

namespace App\Livewire\User\Tryout;

use App\Models\Order;
use App\Models\Result;
use App\Models\Tryout;
use Livewire\Component;
use App\Models\Category;
use App\Models\Question;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\Package_member;
use Illuminate\Support\Facades\DB;

class Item extends Component
{
    public $tryoutId;
    public $tryout;
    public $user;
    public $content;
    public $package;

    public function mount(Request $request) {
        $this->tryoutId = $request->segment(3);
        $this->tryout = Tryout::findOrFail($this->tryoutId);
        $this->user = auth()->user();
        $this->package = Package_member::where('tryout_id', $this->tryoutId)->first();
    
        if($this->tryout->is_together == 'basic' AND $this->tryout->is_free == 'paid'){
            $paid = Order::where('user_id', auth()->id())
                ->where('payment_status', 'paid')
                ->with(['package_member','user'])
                ->whereHas('package_member', function($q){
                    // dd($q);
                    $q->where('tryout_id', $this->tryoutId);
                })->first();
                
            if($paid == null){
                session()->flash('message','kamu tidak memiliki akses untuk paket tersebut');

                return redirect()->route('user.my-packages');
            }
        }
    }

    public function saveTestimonial()
    {
        // dd($this->content);
        $this->validate([
            'content' => 'required|string|max:500',
        ]);
        
        $testi = Testimonial::create([
            'package_member_id' => $this->package->id ?? null,
            'user_id' => auth()->id(),
            'content' => $this->content,
        ]);

        // Reset form
        $this->reset('content');

        // Dispatch JavaScript event
        $this->dispatch('close-modal');

        // Kirim flash message
        session()->flash('success', 'Testimoni berhasil ditambahkan!');
    }

    public function render()
    {
        $categories = Category::with('sub_categories')->get();

        $totalSubCategories = DB::table('sub_categories')->count();
        
        


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
        ]); 
    }
}
