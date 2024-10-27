<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\sub_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, sub_categories $sub_categories)
    {
        // dd($sub_categories);

        try {
            if ($request->ajax()) {
                $query = sub_categories::with('category')->orderBy('created_at', 'desc');
                
                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($sub_categories) {
                        return '<input type="checkbox" class="sub_categories-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="' . $sub_categories->id . '">';
                    })
                    ->addColumn('action', function ($sub_categories) {
                        $editBtn = '<button class="edit-btn inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg  bg-gradient-to-tr from-sky-500 to-sky-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                            data-id="'.$sub_categories->id.'" 
                            data-name="'.$sub_categories->name.'" 
                            data-description="'.$sub_categories->description.'"
                            data-duration="'.$sub_categories->duration.'"
                            data-category="'.$sub_categories->category->name.'">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                            Update
                        </button>';
                        
                        $deleteBtn = '<form action="' . route('admin.sub_categories.destroy', $sub_categories->id) . '" method="POST" class="inline-block ml-2">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white  bg-gradient-to-tr from-rose-500 to-rose-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                Delete
                            </button>
                        </form>';
                        
                        return $editBtn . $deleteBtn;
                    })
                    ->rawColumns(['action', 'checkbox'])
                    ->make(true);
            }

            $categories = Category::all();

            return view('admin.sub_categories.index', compact('categories', 'sub_categories'));
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

            sub_categories::whereIn('id', $ids)->delete();

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
        $data = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',
            'duration' => 'nullable|string',
            'categories_id' => 'required|exists:categories,id',
        ]);

        // dd($data);

        try{
            sub_categories::create($data);
            Log::info("berhasil");
            return redirect()->route('admin.sub_categories.index')->with('success', 'sub_categories Update successfully.');
        } catch (\Exception $e) {
            Log::error('Error in update sub_categories: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(sub_categories $sub_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sub_categories $sub_categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sub_categories = sub_categories::find($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        try {
            $sub_categories->update($data);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'sub_categories updated successfully'
                ]);
            }

            return redirect()->route('admin.sub_categories.index')
                ->with('success', 'sub_categories updated successfully');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sub_categories $sub_categories)
    {
        try {
            $sub_categories->delete();
            
            if (request()->ajax()) {
                return response()->json([
                   'success' => true,
                   'message' => 'Sub_categories deleted successfully'
                ]);
            }

            return redirect()->route('admin.sub_categories.index')
                ->with('success', 'Sub_categories deleted successfully');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                   'success' => false,
                   'message' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
