<?php

namespace App\Http\Controllers;

use App\Models\Package_member;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        try {
            if ($request->ajax()) {
                $query = Testimonial::with(['package_member', 'user']);
                
               // Check if a filter is applied
                if ($request->has('package_member_id') && $request->package_member_id != '') {
                    $query->where('package_member_id', $request->package_member_id);
                }

                if ($request->has('is_show') && $request->is_show != '') {
                    $query->where('is_show', $request->is_show);
                }

                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($testimonial) {
                        return '<input type="checkbox" class="testimonial-checkbox w-4 h-4 text-blue-600 bg-gray-100 btestimonial-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:btestimonial-gray-600" value="' . $testimonial->id . '">';
                    })
                    ->addColumn('created_at', function ($testimonial) {
                        return date('j F Y', strtotime($testimonial->created_at));
                    })
                    ->addColumn('action', function ($testimonial) {
                        $editBtn = '<a href="' . route('admin.testimonial.edit', $testimonial->id) . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update
                        </a>';
                        
                        $deleteBtn = '<form action="' . route('admin.testimonial.destroy', $testimonial->id) . '" method="POST" class="inline-block">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white  bg-gradient-to-tr from-rose-400 to-rose-500 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                Delete
                            </button>
                        </form>';
                        
                        $action = '<div class="flex items-center gap-2">
                            ' 
                            . $editBtn . $deleteBtn .
                            '
                        </div>';
                        
                        return $action;
                    })
                    ->rawColumns(['action', 'checkbox'])
                    ->make(true);
            }

            $testimonial = Testimonial::all(); //
            $packages = Package_member::all();
            return view('admin.testimonial.index', compact('testimonial','packages'));
        } catch (\Exception $e) {
            Log::error('Error in index method: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            if ($request->ajax()) {
                return response()->json(['error' => 'An error occurred while processing your request.'], 500);
            }
            return back()->with('error', 'An error occurred while loading the page. Please try again.');
        }
    }


    public function bulkUpdate(Request $request)
    {
        $ids = $request->input('ids');
        $isShow = $request->input('is_show');
        $packages = $request->input('package_member_id');

        $query = Testimonial::whereIn('id', $ids);

        // Update tryout if provided
        if ($isShow) {
            $query->update(['is_show' => $isShow]);
        }

        // Update sub_category if provided
        if ($packages) {
            $query->update(['package_member_id' => $packages]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Selected questions updated successfully'
        ]);
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

            Testimonial::whereIn('id', $ids)->delete();

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        try{
            $data = $request->validate([
                'content' =>'required|string|max:255',
                'package_member_id' => 'required|integer|exists:package_members,id',
            ]);

            $data['user_id'] = auth()->id();

            Testimonial::create($data);
            return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial has been created successfully.');
    
        } catch (\Exception $e) {
            Log::error('Error in create question: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        //

        return view('admin.testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
        // dd($request);

        $data = $request->validate([
            'content' =>'required|string|max:255',
            'is_show' =>'required|in:yes,no',
        ]);

        $testimonial->update($data);
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        //

        $testimonial->delete();
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial has been deleted successfully.');
    }
}
