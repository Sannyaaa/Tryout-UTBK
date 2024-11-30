<?php

namespace App\Http\Controllers;

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

        return view('admin.halaman.edit',[
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

            'about_us_title' => 'required|string',
            'about_us_desc' => 'nullable|string',
            'about_us_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

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

                'about_us_title' => $data['about_us_title'],
                'about_us_desc' => $data['about_us_desc'],
                'about_us_image' => $request->hasFile('about_us_image')? $request->file('about_us_image')->store('assets', 'public') : null,
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

            'about_us_title' => 'required|string',
            'about_us_desc' => 'nullable|string',
            'about_us_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

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

                'about_us_title' => $data['about_us_title'],
                'about_us_desc' => $data['about_us_desc'],
                'about_us_image' => $request->hasFile('about_us_image')? $request->file('about_us_image')->store('assets', 'public') : $homePage->about_us_image,
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
}
