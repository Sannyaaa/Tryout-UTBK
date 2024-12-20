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
use App\Models\Promotion;

class LandingController extends Controller
{
    public function home() {
        $homePage = HomePage::first();

        $faqs = Faq::all();

        $features = Feature::all();

        $component = ComponentPage::first();

        $testimonials = Testimonial::where('is_show','yes')->get();

        $packages = Package_member::latest()->limit(3)->get();

        $teachers = User::with('mentor')->whereHas('mentor',function ($mentor){
            return $mentor->where('is_show','yes');
        })->where('role','mentor')->inRandomOrder()->limit(3)->get();

        $promotions = Promotion::where('is_show','yes')->get();

        return view('index',[
            'homePage' => $homePage,
            'faqs' => $faqs,
            'features' => $features,
            'packages' => $packages,
            'component' => $component,
            'testimonials' => $testimonials,
            'teachers' => $teachers,
            'promotions' => $promotions,
        ]);
    }

    public function mentor(){

        $component = ComponentPage::first();

        $homePage = HomePage::first();

        $mentors = User::with('mentor')->whereHas('mentor',function ($mentor){
            return $mentor->where('is_show','yes');
        })->where('role','mentor')->get();

        return view('mentor',[
            'mentors' => $mentors,
            'component' => $component,
            'homePage' => $homePage,
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
