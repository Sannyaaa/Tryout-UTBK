<?php

namespace App\Http\Controllers;

use App\Livewire\User\Tryouts;
use App\Models\batch;
use App\Models\Benefit;
use App\Models\Bimbel;
use App\Models\Package_member;
use App\Models\tryout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class PackageMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $query = Package_member::with('tryout','bimbel')->orderBy('created_at', 'desc');
                
                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($package_member) {
                        return '<input type="checkbox" class="package_member-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="' . $package_member->id . '">';
                    })
                    ->addColumn('image', function ($package_member) {
                        return asset('storage/' . $package_member->image);
                    })
                    ->addColumn('action', function ($package_member) {
                        $editBtn = '<a href="' . route('admin.package_member.edit', $package_member->id) . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                            Update
                        </a>';
                        
                        $deleteBtn = '<form action="' . route('admin.package_member.destroy', $package_member->id) . '" method="POST" class="inline-block ml-2">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                Delete
                            </button>
                        </form>';
                        
                        return $editBtn . $deleteBtn;
                    })
                    ->rawColumns(['action', 'image', 'checkbox'])
                    ->make(true);
            }

            return view('admin.package_member.index');
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

            Package_member::whereIn('id', $ids)->delete();

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
        $tryout = tryout::all();
        $bimbel = Bimbel::all();
        return view('admin.package_member.create', compact('tryout', 'bimbel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate package member data
        $data = $request->validate([
            'tryout_id' => 'required|exists:tryouts,id',
            'bimbel_id' => 'required|exists:bimbels,id',
            'name' => 'nullable|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'benefits' => 'required|array|min:1',
            'benefits.*' => 'required|string',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
        } else {
            return redirect()->back()->with('error', 'File gambar tidak ditemukan');
        }

        try {
            DB::beginTransaction();

            // Create package member
            $package_member = Package_member::create($data);

            // Create benefits
            foreach ($request->benefits as $benefitText) {
                Benefit::create([
                    'package_member_id' => $package_member->id,
                    'benefit' => $benefitText,
                ]);
            }

            DB::commit();
            return redirect()->route('admin.package_member.index')->with('success', 'Package member created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in create package_member: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Package_member $package_member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package_member $package_member)
    {
        // Pastikan bahwa package_member dan relasi benefits ada
        if (!$package_member) {
            return redirect()->back()->with('error', 'package_member not found.');
        }

        $tryout = tryout::all();
        $bimbel = Bimbel::all();
        $benefit = $package_member->benefit; // Ambil jawaban yang terkait dengan pertanyaan

        return view('admin.package_member.edit', compact('package_member', 'benefit', 'tryout', 'bimbel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $package_member = Package_member::findOrFail($id);
        
        // Validate data
        $data = $request->validate([
            'tryout_id' => 'required|exists:tryouts,id',
            'bimbel_id' => 'required|exists:bimbels,id',
            'name' => 'nullable|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'benefits' => 'required|array|min:1',
            'benefits.*' => 'required|string',
        ]);

        // Handle image upload if there's a new image
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($package_member->image) {
                Storage::disk('public')->delete($package_member->image);
            }
            $data['image'] = $request->file('image')->store('assets', 'public');
        }

        try {
            DB::beginTransaction();

            // Update package member data
            $package_member->update($data);

            // Delete existing benefits
            $package_member->benefits()->delete();

            // Create new benefits
            foreach ($request->benefits as $benefitText) {
                Benefit::create([
                    'package_member_id' => $package_member->id,
                    'benefit' => $benefitText,
                ]);
            }

            DB::commit();
            return redirect()->route('admin.package_member.index')
                ->with('success', 'Package member and benefits updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in update package_member: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package_member $package_member)
    {
        try {
            $package_member->delete();
            return response()->json([
               'success' => true,
               'message' => 'Package member deleted successfully.'
            ]);
        } catch (\Exception $e) {
            Log::error('Error in delete package_member: ' . $e->getMessage());
            return response()->json([
               'success' => false,
               'message' => 'Error deleting package member.'
            ], 500);
        }
    }
}
