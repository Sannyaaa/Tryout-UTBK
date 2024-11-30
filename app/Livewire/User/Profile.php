<?php

namespace App\Livewire\User;

use App\Models\Sekolah;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use App\Models\DataUniversitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{

    use WithFileUploads;

    public $user;
    public $name;
    public $email;
    public $phone;
    public $avatar;
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
        $this->avatar = $user->avatar;
        $this->sekolah_id = $user->sekolah_id;
        $this->status = $user->status;
        $this->data_universitas_id = $user->data_universitas_id;
        $this->second_data_universitas_id = $user->second_data_universitas_id;
    }

    public function update(Request $request)
    {
        // dd($this->);
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|numeric',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sekolah_id' => 'nullable|exists:sekolahs,id',
            'status' => 'nullable|string',
            'data_universitas_id' => 'nullable|exists:data_universitas,id',
            'second_data_universitas_id' => 'nullable|exists:data_universitas,id',
        ]);

        // Handle image upload if there's a new image
        if ($this->avatar) {
            // Delete old image if exists
            if ($this->user->avatar) {
                Storage::disk('public')->delete($this->user->avatar);
            }
            $data['avatar'] = $this->avatar->store('avatar', 'public');
        }

        // dd($this->avatar);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'avatar' => $data['avatar'],
            'sekolah_id' => $this->sekolah_id,
            'status' => $this->status,
            'data_universitas_id' => $this->data_universitas_id,
            'second_data_universitas_id' => $this->second_data_universitas_id,
        ]);

        // dd($this->user);

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
