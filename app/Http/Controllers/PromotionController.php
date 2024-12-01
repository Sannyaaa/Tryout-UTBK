<?php

namespace App\Http\Controllers;

use App\Models\Package_member;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotion = Promotion::all();

        return view('admin.promotion.index', compact('promotion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        }

        try{
            Promotion::create($data);
            Log::info("berhasil");
            return redirect()->route('admin.promotion.index')->with('success', 'Promotion created successfully.');
        } catch (\Exception $e) {
            Log::error('Error in create Promotion: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $promotion = Promotion::find($id);

        return view('admin.promotion.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $promotion = Promotion::find($id);

        $data = $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        }

        try{
            $promotion->update($data);
            Log::info("berhasil");
            return redirect()->route('admin.promotion.index')->with('success', 'Promotion Update successfully.');
        } catch (\Exception $e) {
            Log::error('Error in Update Promotion: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        try{
            $promotion->delete();
            Log::info("berhasil");
            return redirect()->route('admin.promotion.index')->with('success', 'Promotion deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error in delete Promotion: '. $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
