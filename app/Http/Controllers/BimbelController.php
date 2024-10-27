<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBimbelRequest;
use App\Models\batch;
use App\Models\Bimbel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;

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
                $query = Bimbel::orderBy('created_at', 'desc');
                
                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($bimbel) {
                        return '<input type="checkbox" class="bimbel-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="' . $bimbel->id . '">';
                    })
                    ->addColumn('batch_id', function($bimbel) {
                        return $bimbel->batch->name;
                    })
                    ->addColumn('action', function ($bimbel) {
                        $editBtn = '<button class="edit-btn inline-flex items-center px-3 py-2 mx-2 text-sm font-medium text-center text-white rounded-lg  bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                            data-id="'.$bimbel->id.'" 
                            data-name="'.$bimbel->name.'" 
                            data-description="'.$bimbel->description.'"
                            data-batch_id="'.$bimbel->batch_id .'">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                            Update
                        </button>';

                        // $showBtn = '<a href="'. route('admin.bimbel.show',$bimbel->id) .'" class="show-btn inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                        //     <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        //     Show
                        // </a>';
                        
                        $deleteBtn = '<form action="' . route('admin.bimbel.destroy', $bimbel->id) . '" method="POST" class="inline-block">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white  bg-gradient-to-tr from-rose-400 to-rose-500 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                Delete
                            </button>
                        </form>';

                        $action = '<div class="flex items-center gap-2">
                            ' 
                            //  . $showBtn 
                            .
                              $editBtn . $deleteBtn .
                            '
                        </div>';
                        
                        return $action;
                    })
                    ->rawColumns(['action', 'checkbox', 'batch_id'])
                    ->make(true);
            }

            $batchs = batch::all();

            return view('admin.bimbel.index', compact('batchs'));
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

        return view('admin.bimbel.show', compact('bimbel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimbel $bimbel)
    {
        //
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
