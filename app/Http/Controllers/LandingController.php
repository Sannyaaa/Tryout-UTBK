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

    public function mentor(){

        $component = ComponentPage::first();

        $mentors = User::with('mentor')->where('role','mentor')->get();

        return view('mentor',[
            'mentors' => $mentors,
            'component' => $component,
        ]);
    }

    public function package(Request $request){

        $type = $request->get('type','all');

        $packages = Package_member::when($type !== null, function ($query) use ($type){
            if($type == 'tryout'){
                return $query->whereNotNull('tryout_id');
            } elseif($type == 'bimbel'){
                return $query->whereNull('tryout_id');
            }
        })->get();

        $component = ComponentPage::first();

        return view('package',[
            'packages' => $packages,
            'type' => $type,
            'component' => $component,
        ]);
    }
}
