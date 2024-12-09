<?php

namespace App\Http\Controllers;

use App\Models\ComponentPage;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    //

    public function homePage() {
        $homePage = HomePage::first();

        $faqs = Faq::all();

        $features = Feature::all();

        $icons = json_decode(file_get_contents(resource_path('json/icons.json')), true);

        return view('admin.halaman.home',[
            'homePage' => $homePage,
            'faqs' => $faqs,
            'icons' => $icons,
            'features' => $features,
        ]);
    }

    public function createHomePage(Request $request) {

        // dd($request->all());

        $data = $request->validate([
            'hero_title' => 'required|string',
            'hero_desc' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'feature_title' => 'required|string',
            'feature_description' => 'nullable|string',

            'about_us_title' => 'required|string',
            'about_us_desc' => 'nullable|string',
            'about_us_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'package_title' => 'required|string',
            'package_desc' => 'nullable|string',

            'mentor_title' => 'required|string',
            'mentor_desc' => 'nullable|string',

            'testimonial_title' => 'required|string',
            'testimonial_desc' => 'nullable|string',

            'faq_title' => 'required|string',
            'faq_desc' => 'nullable|string',

            'question' => 'required|array|min:1',
            'question.*' => 'required|string',
            'answer' => 'required|array|min:1',
            'answer.*' => 'required|string',

            'feature_name' => 'required|array|min:1',
            'feature_name.*' => 'required|string',
            'feature_desc' => 'required|array|min:1',
            'feature_desc.*' => 'required|string',
            'feature_icon' => 'required|array|min:1',
            'feature_icon.*' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            // Create package member
            $homePage = HomePage::create([
                'hero_title' => $data['hero_title'],
                'hero_desc' => $data['hero_desc'],
                'hero_image' => $request->hasFile('hero_image')? $request->file('hero_image')->store('assets', 'public') : null,

                'feature_title' => $data['feature_title'],
                'feature_desc' => $data['feature_description'],

                'about_us_title' => $data['about_us_title'],
                'about_us_desc' => $data['about_us_desc'],
                'about_us_image' => $request->hasFile('about_us_image')? $request->file('about_us_image')->store('assets', 'public') : null,

                'package_title' => $data['package_title'],
                'package_desc' => $data['package_desc'],

                'mentor_title' => $data['mentor_title'],
                'mentor_desc' => $data['mentor_desc'],

                'testimonial_title' => $data['testimonial_title'],
                'testimonial_desc' => $data['testimonial_desc'],    

                'faq_title' => $data['faq_title'],
                'faq_desc' => $data['faq_desc'],
            ]);


            // Create faqs
            foreach ($request->question as $i => $question) {
                Faq::create([
                    'question' => $question,
                    'answer' => $request->answer[$i],
                ]);
            }

            foreach ($request->feature_name as $i => $feature_name) {
                Feature::create([
                    'name' => $feature_name,
                    'description' => $request->feature_desc[$i],
                    'image' => $request->feature_icon[$i],
                ]);
            }

            DB::commit();
            return redirect()->route('admin.home-page')->with('success', 'Berhasil Ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in create package_member: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function editHomePage(Request $request, HomePage $homePage) {

        $homePage = HomePage::first();

        $data = $request->validate([
            'hero_title' => 'required|string',
            'hero_desc' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'feature_title' => 'required|string',
            'feature_description' => 'nullable|string',

            'about_us_title' => 'required|string',
            'about_us_desc' => 'nullable|string',
            'about_us_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'package_title' => 'required|string',
            'package_desc' => 'nullable|string',

            'mentor_title' => 'required|string',
            'mentor_desc' => 'nullable|string',

            'testimonial_title' => 'required|string',
            'testimonial_desc' => 'nullable|string',

            'faq_title' => 'required|string',
            'faq_desc' => 'nullable|string',

            'question' => 'required|array|min:1',
            'question.*' => 'required|string',
            'answer' => 'required|array|min:1',
            'answer.*' => 'required|string',

            'feature_name' => 'required|array|min:1',
            'feature_name.*' => 'required|string',
            'feature_desc' => 'required|array|min:1',
            'feature_desc.*' => 'required|string',
            'feature_icon' => 'required|array|min:1',
            'feature_icon.*' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            // Create package member
            // $homePage = HomePage::create([
            //     'hero_title' => $data['hero_title'],
            //     'hero_desc' => $data['hero_desc'],
            //     'hero_image' => $request->hasFile('hero_image')? $request->file('hero_image')->store('assets', 'public') : null,

            //     'about_us_title' => $data['about_us_title'],
            //     'about_us_desc' => $data['about_us_desc'],
            //     'about_us_image' => $request->hasFile('about_us_image')? $request->file('about_us_image')->store('assets', 'public') : null,
            // ]);
            
            // Update home page
            $homePage->update([
                'hero_title' => $data['hero_title'],
                'hero_desc' => $data['hero_desc'],
                'hero_image' => $request->hasFile('hero_image')? $request->file('hero_image')->store('assets', 'public') : $homePage->hero_image,

                'feature_title' => $data['feature_title'],
                'feature_desc' => $data['feature_description'],

                'about_us_title' => $data['about_us_title'],
                'about_us_desc' => $data['about_us_desc'],
                'about_us_image' => $request->hasFile('about_us_image')? $request->file('about_us_image')->store('assets', 'public') : $homePage->about_us_image,

                'package_title' => $data['package_title'],
                'package_desc' => $data['package_desc'],

                'mentor_title' => $data['mentor_title'],
                'mentor_desc' => $data['mentor_desc'],

                'testimonial_title' => $data['testimonial_title'],
                'testimonial_desc' => $data['testimonial_desc'],

                'faq_title' => $data['faq_title'],
                'faq_desc' => $data['faq_desc'],
            ]);

            // Create faqs
            // foreach ($request->question as $i => $question) {
            //     Faq::create([
            //         'question' => $question,
            //         'answer' => $request->answer[$i],
            //     ]);
            // }

            // Update faqs
            Faq::query()->delete();

            foreach ($request->question as $i => $question) {
                Faq::create([
                    'question' => $question,
                    'answer' => $request->answer[$i],
                ]);
            }

            // dd($request->feature_name);
            // Update features
            Feature::query()->delete();

            foreach ($request->feature_name as $i => $feature_name) {
                Feature::create([
                    'name' => $feature_name,
                    'description' => $request->feature_desc[$i],
                    'image' => $request->feature_icon[$i],
                ]);
            }

            DB::commit();
            return redirect()->route('admin.home-page')->with('success', 'Berhasil Diubah.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in create package_member: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function componentPage(){
        $componentPage = ComponentPage::first();

        return view('admin.halaman.component', compact('componentPage'));
    }

    public function componentStore(Request $request){
        $data = $request->validate([
            'navbar_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'footer_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_desc' => 'nullable|string',
            'facebook' =>'required|string',
            'instagram' =>'required|string',
            'x' =>'required|string',
            'youtube' =>'required|string',
            'tiktok' =>'required|string',
            'email' =>'required|email',
            'phone' =>'required',
            'address' =>'required|string',
            'copyright' =>'required|string',
        ]);

        try {
            $componentPage = ComponentPage::create([

                'navbar_image' => $request->hasFile('navbar_image')? $request->file('navbar_image')->store('assets', 'public') : null,
                'footer_image' => $request->hasFile('footer_image')? $request->file('footer_image')->store('assets', 'public') : null,

                'short_desc' => $data['short_desc'],
                'facebook' => $data['facebook'],
                'instagram' => $data['instagram'],

                'x' => $data['x'],
                'youtube' => $data['youtube'],
                'tiktok' => $data['tiktok'],

                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'copyright' => $data['copyright'],

            ]);

            return redirect()->route('admin.component-page')->with('success', 'Berhasil Ditambahkan.');

        } catch (\Exception $e) {

            Log::error('Error in create component: '. $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    public function componentUpdate(Request $request, ComponentPage $componentPage){

        $componentPage = ComponentPage::first();

        $data = $request->validate([
            'navbar_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'footer_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_desc' => 'nullable|string',
            'facebook' =>'required|string',
            'instagram' =>'required|string',
            'x' =>'required|string',
            'youtube' =>'required|string',
            'tiktok' =>'required|string',
            'email' =>'required|email',
            'phone' =>'required',
            'address' =>'required|string',
            'copyright' =>'required|string',
        ]);

        try {
            $componentPage->update([
                'navbar_image' => $request->hasFile('navbar_image')? $request->file('navbar_image')->store('assets', 'public') : $componentPage->navbar_image,
                'footer_image' => $request->hasFile('footer_image')? $request->file('footer_image')->store('assets', 'public') : $componentPage->footer_image,

                'short_desc' => $data['short_desc'],
                'facebook' => $data['facebook'],
                'instagram' => $data['instagram'],

                'x' => $data['x'],
                'youtube' => $data['youtube'],
                'tiktok' => $data['tiktok'],

                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'copyright' => $data['copyright'],
            ]);

            return redirect()->route('admin.component-page')->with('success', 'Berhasil Diubah.');
        } catch (\Exception $e) {
            Log::error('Error in update component: '. $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    
        // $componentPage = ComponentPage::first();
        // $data = $request->validate([
        //     'title' =>'required|string',
        //     'description' => 'nullable|string',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // try {
        //     $componentPage->update([
        //         'title' => $data['title'],
        //         'description' => $data['description'],
        //         'image' => $request->hasFile('image')? $request->file('image')->store('assets', 'public') : $componentPage->image,
        //     ]);

        //     return redirect()->route('admin.component')->with('success', 'Berhasil Diubah.');
        // } catch (\Exception $e) {
            // Log::error('Error in update component: '. $e->getMessage());
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    
        // return view('admin.halaman.component', compact('componentPage'));
    
        // $componentPage = ComponentPage::first();
        // return view('admin.halaman.component', compact('componentPage'));
    
        // $data = $request->validate([
        //     'title' =>'required|string',
        //     'description' => 'nullable|string',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // try {
        //     $componentPage->update([
        //         'title' => $data['title'],
        //         'description' => $data['description'],
        //         'image' => $request->hasFile('image')? $request->file('image')->store('assets', 'public') : $componentPage->image,
        //     ]);

        //     return redirect()->route('admin.component')->with('success', 'Berhasil Diubah.');
        // } catch (\Exception $e) {
        //     Log::error('Error in update component: '. $e->getMessage());
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    }

}
