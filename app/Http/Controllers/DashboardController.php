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
            return redirect()->route('user.dashboard');
        }else{
            return redirect()->route('admin.dashboard');
        }
    }

    public function settings(){
        return view('settings');
    }
}
