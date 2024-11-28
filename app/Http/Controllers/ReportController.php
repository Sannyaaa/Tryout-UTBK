<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Transaction;

class ReportController extends Controller
{
    public function index(Request $request)
{
    // Ambil tahun-tahun unik dari data order yang sudah dibayar
    $years = Order::where('payment_status', 'paid')
        ->selectRaw('DISTINCT YEAR(created_at) as year')
        ->orderBy('year', 'desc')
        ->pluck('year');

    // Filter laporan berdasarkan tahun dan bulan (opsional)
    $query = Order::where('payment_status', 'paid');

    // Jika ada filter tahun dari request
    if ($request->has('year')) {
        $query->whereYear('created_at', $request->year);
    }

    // Jika ada filter bulan (static)
    if ($request->has('month')) {
        $query->whereMonth('created_at', $request->month);
    }


    // Tentukan tahun yang dipilih (default tahun saat ini jika tidak ada pilihan)
    $selectedYear = $request->input('year', date('Y'));

    // Siapkan array default untuk semua 12 bulan
    $monthlyRevenueData = array_fill(0, 12, 0);

    // Ambil total pendapatan per bulan untuk tahun yang dipilih
    $monthlyRevenue = Order::where('payment_status', 'paid')
        ->whereYear('created_at', $selectedYear)
        ->selectRaw('MONTH(created_at) as month, SUM(final_price) as total_revenue')
        ->groupBy('month')
        ->get();

    // Update data pendapatan untuk bulan-bulan yang memiliki transaksi
    foreach ($monthlyRevenue as $revenue) {
        // Kurangi 1 karena array dimulai dari index 0
        $monthlyRevenueData[$revenue->month - 1] = round($revenue->total_revenue, 2);
    }

    $report = $query->get();
    $total = $query->sum('final_price');

    return view('admin.report', compact('report', 'years', 'selectedYear', 'monthlyRevenueData', 'total'));
}
}
