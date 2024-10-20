<?php

namespace App\Http\Controllers;

use App\Models\batch;
use App\Models\tryout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TryoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tryout = Tryout::paginate(1);

        return view('admin.tryout.index', compact('tryout'));
    }


    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batch = batch::all();

        return view('admin.tryout.create', compact('batch'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, batch $batch)
    {

        // dd($request);
        $data = $request->validate([
            'name' => 'nullable|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|string',
            'end_date' => 'nullable|string',
            'batch_id' => 'required|exists:batches,id',
            'is_free' => ['required', 'in:paid,free'],
            'is_together' => ['required', 'in:basic,together']
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        } else {
            return redirect()->back()->with('error', 'File gambar tidak ditemukan');
        }

        // dd($data);

        try{
            Tryout::create($data);
            Log::info("berhasil");
            return redirect()->route('admin.tryout.index')->with('success', 'Tryout created successfully.');
        } catch (\Exception $e) {
            Log::error('Error in create tryout: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(tryout $tryout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tryout $tryout)
    {
        $batch = Batch::all();

        return view('admin.tryout.edit', compact('batch', 'tryout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $tryout = tryout::findOrFail($id);

        $data = $request->validate([
            'name' => 'nullable|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|string',
            'end_date' => 'nullable|string',
            'batch_id' => 'required|exists:batches,id',
            'is_free' => ['required', 'in:paid,free'],
            'is_together' => ['required', 'in:basic,together']
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        } else {
            return redirect()->back()->with('error', 'File gambar tidak ditemukan');
        }

        // dd($data);

        try{
            $tryout->update($data);
            Log::info("berhasil");
            return redirect()->route('admin.tryout.index')->with('success', 'Tryout Update successfully.');
        } catch (\Exception $e) {
            Log::error('Error in update tryout: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tryout $tryout)
    {
        try{
            $tryout->delete();
            Log::info("berhasil");
            return redirect()->route('admin.tryout.index')->with('success', 'Tryout deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error in delete tryout: '. $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // public function bulkDelete(Request $request)
    // {
    //     $selectedTryoutIds = $request->input('tryout_ids');

    //     if ($selectedTryoutIds) {
    //         // Hapus data tryout yang dipilih
    //         Tryout::whereIn('id', $selectedTryoutIds)->delete();

    //         return back()->with('success', 'Data tryout berhasil dihapus.');
    //     }

    //     return back()->with('error', 'Tidak ada data yang dipilih.');
    // }
}
