<?php

namespace App\Livewire\User;

use App\Models\Sekolah;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\DataUniversitas;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{

    use WithFileUploads;

    public $user;
    public $name;
    public $email;
    public $phone;
    public $sekolah_id;
    public $status;
    public $data_universitas_id;
    public $second_data_universitas_id;

    public function mount()
    {
        $user = Auth::user();
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->sekolah_id = $user->sekolah_id;
        $this->status = $user->status;
        $this->data_universitas_id = $user->data_universitas_id;
        $this->second_data_universitas_id = $user->second_data_universitas_id;
    }

    public function update()
    {
        // dd($this->);
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|numeric',
            'sekolah_id' => 'nullable|exists:sekolahs,id',
            'status' => 'nullable|string',
            'data_universitas_id' => 'nullable|exists:data_universitas,id',
            'second_data_universitas_id' => 'nullable|exists:data_universitas,id',
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'sekolah_id' => $this->sekolah_id,
            'status' => $this->status,
            'data_universitas_id' => $this->data_universitas_id,
            'second_data_universitas_id' => $this->second_data_universitas_id,
        ]);

        session()->flash('message', 'Profile updated successfully.');
    }

    public function render()
    {
        $university = DataUniversitas::all();

        $sekolah = Sekolah::all();

        return view('livewire.user.profile',[
            'user' => $this->user,
            'university' => $university,
            'sekolah' => $sekolah,
        ]);
    }
}
