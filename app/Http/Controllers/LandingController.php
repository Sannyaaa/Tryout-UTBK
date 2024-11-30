<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\HomePage;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home() {
        $homePage = HomePage::findOrFail(2);

        $faqs = Faq::all();

        return view('home',[
            'homePage' => $homePage,
            'faqs' => $faqs,
        ]);
    }
}
