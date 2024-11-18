<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();

        if($user->role == 'user'){
            return view('livewire.user.dashboard');
        }else{
            return view('admin.dashboard');
        }
    }

    public function settings(){
        return view('settings');
    }
}
