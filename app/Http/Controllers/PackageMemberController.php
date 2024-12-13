<?php

namespace App\Http\Controllers;

use App\Exports\PaketMemberExport;
use App\Livewire\User\Tryouts;
use App\Models\batch;
use App\Models\Benefit;
use App\Models\Bimbel;
use App\Models\Discount;
use App\Models\Package_member;
use App\Models\tryout;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
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
                $query = Package_member::with('tryout','bimbel')->get();
                
                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($package_member) {
                        return '<input type="checkbox" class="package_member-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="' . $package_member->id . '">';
                    })
                    ->addColumn('image', function ($package_member) {
                        return asset('storage/' . $package_member->image);
                    })
                    ->addColumn('created_at', function($tryout) {
                        return date('j F Y', strtotime($tryout->created_at));
                    })
                    ->addColumn('action', function ($package_member) {
                        $editBtn = '<a href="' . route('admin.package_member.edit', $package_member->id) . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-tr from-sky-400 to-sky-500 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update
                        </a>';
                        
                        $deleteBtn = '<form action="' . route('admin.package_member.destroy', $package_member->id) . '" method="POST" class="inline-block ml-2">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white  bg-gradient-to-tr from-rose-400 to-rose-500 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                Delete
                            </button>
                        </form>';
                        
                        return $editBtn . $deleteBtn;
                    })
                    ->rawColumns(['action', 'image', 'checkbox'])
                    ->make(true);
            }

             // Ekspor ke Excel
            if ($request->has('export_excel')) {
                $data = Package_member::with(['tryout', 'bimbel'])->get(); // Ambil data
                return Excel::download(new PaketMemberExport($data), 'paket_data.xlsx');
            }

            // Ekspor ke PDF
            if ($request->has('export_pdf')) {
                $data = Package_member::with(['tryout', 'bimbel'])->get(); // Ambil data
                $pdf = Pdf::loadView('admin.package_member.pdf', compact('data'));
                return $pdf->download('paket_data.pdf');
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
        $tryout = tryout::where('is_free', 'paid')->get();
        $bimbel = Bimbel::all();
        $discounts = Discount::all();
        return view('admin.package_member.create', compact('tryout', 'bimbel','discounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate package member data
        $data = $request->validate([
            'tryout_id' => 'required_without:bimbel_id|exists:tryouts,id',
            'bimbel_id' => 'required_without:tryout_id|exists:bimbels,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'benefits' => 'required|array|min:1',
            'benefits.*' => 'required|string',
            'discounts' => 'array',
            'discounts.*' => 'integer|exists:discounts,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'bimbel_id.required_without' => 'Bimbel atau Tryout harus diisi.',
            'tryout_id.required_without' => 'Tryout atau Bimbel harus diisi.',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets', 'public');
            $data['image'] = $image;
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

            if($request->has('discounts')){
                $package_member->discounts()->attach($request->discounts);
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

        // $package_member::wi
        $tryout = tryout::where('is_free', 'paid')->get();
        $bimbel = Bimbel::all();
        $discounts = Discount::all();
        $benefit = $package_member->benefit; // Ambil jawaban yang terkait dengan pertanyaan

        return view('admin.package_member.edit', compact('package_member', 'discounts','benefit', 'tryout', 'bimbel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $package_member = Package_member::findOrFail($id);
        
        // Validate data
        $data = $request->validate([
            'tryout_id' => 'nullable|exists:tryouts,id',
            'bimbel_id' => 'nullable|exists:bimbels,id',
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|string',
            'benefits' => 'nullable|array|min:1',
            'benefits.*' => 'nullable|string',
            'discounts' => 'array',
            'discounts.*' => 'integer|exists:discounts,id',
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
            
            $package_member->discounts()->sync($request->discounts);

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
            // return response()->json([
            //    'success' => true,
            //    'message' => 'Package member deleted successfully.'
            // ]);

            return redirect()->route('admin.package_member.index')->with('success','Berhasil menghapus paket');
        } catch (\Exception $e) {
            Log::error('Error in delete package_member: ' . $e->getMessage());
            return response()->json([
               'success' => false,
               'message' => 'Error deleting package member.'
            ], 500);
        }
    }
}
