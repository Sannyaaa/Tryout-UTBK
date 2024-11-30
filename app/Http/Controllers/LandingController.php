<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Feature;
use App\Models\HomePage;
use App\Models\Package_member;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home() {
        $homePage = HomePage::first();

        $faqs = Faq::all();

        $features = Feature::all();

        $packages = Package_member::latest()->limit(3)->get();

        return view('index',[
            'homePage' => $homePage,
            'faqs' => $faqs,
            'features' => $features,
            'packages' => $packages,
        ]);
    }
}
