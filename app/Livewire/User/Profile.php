<?php

namespace App\Livewire\User;

use App\Models\Sekolah;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use App\Models\DataUniversitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{

    use WithFileUploads;

    public $user;
    public $name;
    public $email;
    public $phone;
    public $avatar;
    public $current_avatar;
    public $sekolah_id;
    public $status;
    public $tgl;
    public $jenis_kelamin;
    public $data_universitas_id;
    public $second_data_universitas_id;

    public $current_password;
    public $new_password;
    public $confirm_password;

    public function mount()
    {
        $user = Auth::user();
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->current_avatar = $user->avatar;
        $this->sekolah_id = $user->sekolah_id;
        $this->status = $user->status;
        $this->tgl = $user->tgl;
        $this->jenis_kelamin = $user->jenis_kelamin;
        $this->data_universitas_id = $user->data_universitas_id;
        $this->second_data_universitas_id = $user->second_data_universitas_id;
        
    }

    public function update(Request $request)
    {
        // dd($this->avatar);
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable',
            'sekolah_id' => 'nullable|exists:sekolahs,id',
            'status' => 'nullable|string',
            'tgl' => 'nullable|date',
            'jenis_kelamin' => 'nullable|string',
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
        }else{
            $data['avatar'] = $this->current_avatar; // keep the old avatar if no new image is uploaded
        }

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'avatar' => $data['avatar'],
            'sekolah_id' => $this->sekolah_id,
            'status' => $this->status,
            'tgl' => $this->tgl,
            'jenis_kelamin' => $this->jenis_kelamin,
            'data_universitas_id' => $this->data_universitas_id,
            'second_data_universitas_id' => $this->second_data_universitas_id,
        ]);

        // dd($this->user);

        session()->flash('message', 'Profile updated successfully.');
    }

    public function updatePassword(){
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|different:current_password',
            'confirm_password' => 'required|same:new_password',
        ]);

        // Check if current password is correct
        if (!Hash::check($this->current_password, Auth::user()->password)) {
            $this->addError('current_password', 'Current password is incorrect.');
            return;
        }

        // Update password
        Auth::user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        // Reset fields and display success message
        $this->reset(['current_password', 'new_password', 'confirm_password']);
        session()->flash('message', 'Password updated successfully!');
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
