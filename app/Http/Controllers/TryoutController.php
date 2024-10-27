<?php

namespace App\Http\Controllers;

use App\Models\batch;
use App\Models\tryout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

use function Pest\Laravel\get;

class TryoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $query = tryout::with('batch')->orderBy('created_at', 'desc');
                
                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($tryout) {
                        return '<input type="checkbox" class="tryout-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="' . $tryout->id . '">';
                    })
                    ->addColumn('image', function ($tryout) {
                        return asset('storage/' . $tryout->image);
                    })
                    ->addColumn('action', function ($tryout) {
                        $editBtn = '<a href="' . route('admin.tryout.edit', $tryout->id) . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                            Update
                        </a>';
                        
                        $deleteBtn = '<form action="' . route('admin.tryout.destroy', $tryout->id) . '" method="POST" class="inline-block ml-2">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white  bg-gradient-to-tr from-rose-400 to-rose-500 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                Delete
                            </button>
                        </form>';
                        
                        return $editBtn . $deleteBtn;
                    })
                    ->rawColumns(['action', 'image', 'checkbox'])
                    ->make(true);
            }

            return view('admin.tryout.index');
        } catch (\Exception $e) {
            Log::error('Error in index method: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            if ($request->ajax()) {
                return response()->json(['error' => 'An error occurred while processing your request.'], 500);
            }
            return back()->with('error', 'An error occurred while loading the page. Please try again.');
        }
    }


    public function bulkDelete(Request $request)
    {
        try {
            $ids = $request->ids;
            
            if (!is_array($ids)) {
                return response()->json([
                    'success' => false,
                    'message' => 'No items selected'
                ], 400);
            }

            Tryout::whereIn('id', $ids)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Selected items have been deleted'
            ]);

        } catch (\Exception $e) {
            Log::error('Error in bulk delete: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error deleting selected items'
            ], 500);
        }
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
            'is_together' => ['required', 'in:basic,together'],
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
            'is_together' => ['required', 'in:basic,together'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
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
