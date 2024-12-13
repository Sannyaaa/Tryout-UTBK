<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Package_member;
use App\Models\Tryout;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        try {
            if ($request->ajax()) {
                $query = Order::with('package_member');
                
               // Check if a filter is applied
                if ($request->has('payment_status') && $request->payment_status != '') {
                    $query->where('payment_status', $request->payment_status);
                }

                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($order) {
                        return '<input type="checkbox" class="order-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="' . $order->id . '">';
                    })
                    ->addColumn('created_at', function ($order) {
                        return date('j F Y', strtotime($order->created_at));
                    })
                    ->addColumn('action', function ($order) {
                        $editBtn = '<a href="' . route('admin.order.edit', $order->id) . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update
                        </a>';
                        
                        $deleteBtn = '<form action="' . route('admin.order.destroy', $order->id) . '" method="POST" class="inline-block">
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
                    ->rawColumns(['action', 'image', 'checkbox'])
                    ->make(true);
            }

             // Ekspor ke Excel
            if ($request->has('export_excel')) {
                $data = Order::with(['package_member', 'discount'])->get(); // Ambil data
                return Excel::download(new OrderExport($data), 'order_data.xlsx');
            }

            // // Ekspor ke PDF
            // if ($request->has('export_pdf')) {
            //     $data = Order::with(['package_member'])->get(); // Ambil data
            //     $pdf = Pdf::loadView('admin.order.pdf', compact('data'));
            //     return $pdf->download('order_data.pdf');
            // }

            $order = Order::all(); //
            return view('admin.order.index', compact('order'));
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
        try {
            $validator = Validator::make($request->all(), [
                'ids' => 'required|array',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false, 
                    'message' => $validator->errors()->first()
                ], 422);
            }

            // Siapkan data update
            $updateData = [];
            
            // Tambahkan is_free jika ada
            if ($request->has('payment_status')) {
                $updateData['payment_status'] = $request->payment_status;
            }
            
            // // Tambahkan is_together jika ada
            // if ($request->has('is_together')) {
            //     $updateData['is_together'] = $request->is_together;
            // }

            // Pastikan ada data yang akan diupdate
            if (empty($updateData)) {
                return response()->json([
                    'success' => false, 
                    'message' => 'Tidak ada data yang akan diupdate'
                ], 400);
            }

            // Lakukan update
            $updatedCount = Order::whereIn('id', $request->ids)
                ->update($updateData);

            return response()->json([
                'success' => true, 
                'message' => "Berhasil mengupdate {$updatedCount} tryout"
            ]);

        } catch (\Exception $e) {
            Log::error('Bulk Update Error: ' . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Terjadi kesalahan saat memproses update'
            ], 500);
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

            Order::whereIn('id', $ids)->delete();

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
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
        $packages = Package_member::all();
        $vouchers = Discount::all();

        return view('admin.order.edit', compact('order','packages','vouchers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //

        $data = $request->validate([
            'invoice' => 'required',
            'final_price' => 'required',
            'payment_status' => 'required',
            'discount_id' => 'nullable|string',
        ]);

        if($request->payment_status == 'paid' || $order->payment == 'pending'){
            $data['payment_status'] = 'paid';
            $data['is_admin'] = 'yes';
        }
        $order->update($data);
        return redirect()->route('admin.order.index')->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //

        $order->delete();
        
        return redirect()->route('admin.order.index')->with('success', 'Order deleted successfully');
    }
}
