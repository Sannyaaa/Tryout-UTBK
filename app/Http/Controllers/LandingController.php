<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\User;
use App\Models\Feature;
use App\Models\HomePage;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\ComponentPage;
use App\Models\Package_member;

class LandingController extends Controller
{
    public function home() {
        $homePage = HomePage::first();

        $faqs = Faq::all();

        $features = Feature::all();

        $component = ComponentPage::first();

        $testimonials = Testimonial::where('is_show','yes')->get();

        $packages = Package_member::latest()->limit(3)->get();

        $teachers = User::where('role','mentor')->inRandomOrder()->limit(3)->get();

        return view('index',[
            'homePage' => $homePage,
            'faqs' => $faqs,
            'features' => $features,
            'packages' => $packages,
            'component' => $component,
            'testimonials' => $testimonials,
            'teachers' => $teachers,
        ]);
    }
}
