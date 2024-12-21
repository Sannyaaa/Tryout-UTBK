<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        try {
            if ($request->ajax()) {
                $query = Discount::query();
                
                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($discount) {
                        return '<input type="checkbox" class="discount-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="' . $discount->id . '">';
                    })
                    ->editColumn('start_date', function ($discount) {
                        return date('j F Y', strtotime($discount->start_date));
                    })
                    ->editColumn('end_date', function ($discount) {
                        return date('j F Y', strtotime($discount->end_date));
                    })
                    ->editColumn('created_at', function ($discount) {
                        return date('j F Y', strtotime($discount->created_at));
                    })
                    ->addColumn('action', function ($discount) {
                        $editBtn = '<a href="' . route('admin.discount.edit', $discount->id) . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg  bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update
                        </a>';
                        
                        $deleteBtn = '<form action="' . route('admin.discount.destroy', $discount->id) . '" method="POST" class="inline-block ml-2">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white  bg-gradient-to-tr from-rose-400 to-rose-500 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                Delete
                            </button>
                        </form>';
                        
                        return $editBtn . $deleteBtn;
                    })
                    ->rawColumns(['action', 'checkbox', 'created_at', 'start_date', 'end_date'])
                    ->make(true);
            }

            return view('admin.discount.index');
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

            Discount::whereIn('id', $ids)->delete();

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

        return view('admin.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountRequest $request)
    {
        //

        $data = $request->validated();

        // dd($data);

        try{
            Discount::create($data);
            Log::info("berhasil");
            return redirect()->route('admin.discount.index')->with('success', 'Discount created successfully.');
        } catch (\Exception $e) {
            Log::error('Error in create discount: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        //

        return view('admin.discount.edit', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountRequest $request, Discount $discount)
    {
        //

        $data = $request->validated();

        try{
            $discount->update($data);
            Log::info("berhasil");
            return redirect()->route('admin.discount.index')->with('success', 'Discount Update successfully.');
        } catch (\Exception $e) {
            Log::error('Error in update discount: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        //

        try{
            $discount->delete();
            Log::info("berhasil");
            return redirect()->route('admin.discount.index')->with('success', 'Discount deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error in delete discount: '. $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
