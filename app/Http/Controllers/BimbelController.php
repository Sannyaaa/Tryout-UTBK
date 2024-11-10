<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\batch;
use App\Models\Bimbel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\sub_categories;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreBimbelRequest;
use App\Models\ClassBimbel;

class BimbelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        try {
            if ($request->ajax()) {
                $query = Bimbel::all();
                
                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($bimbel) {
                        return '<input type="checkbox" class="bimbel-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="' . $bimbel->id . '">';
                    })
                    ->addColumn('created_at', function($bimbel) {
                        return date('j F Y', strtotime($bimbel->created_at)) ;
                    })
                    ->addColumn('link_group', function($bimbel) {
                        $link = $bimbel->link_group != null ? '<a href="'. $bimbel->link_group .'" target="__blank" class=" text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >Link</a>' : 'belum ada';

                        return $link;
                    })
                    ->addColumn('action', function ($bimbel) {
                        $editBtn = '<button class="edit-btn inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg  bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                            data-id="'.$bimbel->id.'" 
                            data-name="'.$bimbel->name.'" 
                            data-description="'.$bimbel->description.'">
                            Edit
                        </button>';

                        $showBtn = '<a href="'. route('admin.bimbel.show',$bimbel->id) .'" class="show-btn inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg  bg-gradient-to-tr from-emerald-400 to-emerald-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Detail
                        </a>';
                        
                        $deleteBtn = '<form action="' . route('admin.bimbel.destroy', $bimbel->id) . '" method="POST" class="inline-block">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-base font-semibold text-center text-white  bg-gradient-to-tr from-rose-400 to-rose-500 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                
                                Delete
                            </button>
                        </form>';

                        $action = '<div class="flex items-center gap-2 font-semibold">
                            ' 
                             . $showBtn . $editBtn . $deleteBtn .
                            '
                        </div>';
                        
                        return $action;
                    })
                    ->rawColumns(['action', 'checkbox', 'link_group'])
                    ->make(true);
            }

            return view('admin.bimbel.index');
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

            Bimbel::whereIn('id', $ids)->delete();

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

    public function class_create(Bimbel $bimbel)
    {
        //
        $back = route('admin.bimbel.show',$bimbel->id);

        $bimbels = Bimbel::all();

        $users = User::all();

        $subCategories = sub_categories::all();

        return view('admin.class-bimbel.create', compact('bimbel','bimbels','users','subCategories','back'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBimbelRequest $request)
    {
        //

        $data = $request->validated();

        try{
            Bimbel::create($data);
            Log::info("berhasil");
            return redirect()->route('admin.bimbel.index')->with('success', 'bimbel Update successfully.');
        } catch (\Exception $e) {
            Log::error('Error in update bimbel: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimbel $bimbel)
    {
        //

        $classes = ClassBimbel::where('bimbel_id', $bimbel->id)->get();

        return view('admin.bimbel.show', compact('bimbel','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimbel $bimbel)
    {
        //
    }

    public function class_edit(Bimbel $bimbel, ClassBimbel $classBimbel)
    {
        //
        $back = route('admin.bimbel.show',$bimbel->id);

        $bimbels = Bimbel::all();

        $users = User::all();

        $subCategories = sub_categories::all();

        return view('admin.class-bimbel.edit', compact('bimbel','bimbels','users','subCategories','back', 'classBimbel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBimbelRequest $request, Bimbel $bimbel)
    {
        //

        $data = $request->validated();

        try {
            $bimbel->update($data);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Bimbel updated successfully'
                ]);
            }

            return redirect()->route('admin.bimbel.index')
                ->with('success', 'Bimbel updated successfully');
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
    public function destroy(Bimbel $bimbel)
    {
        //

        try{
            $bimbel->delete();
            Log::info("berhasil");

            return redirect()->route('admin.bimbel.index')->with('success', 'bimbel deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error in delete bimbel: '. $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
