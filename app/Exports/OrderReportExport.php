<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Collection;

class OrderReportExport implements FromCollection, WithHeadings, ShouldAutoSize, WithTitle
{
    protected $year;
    protected $month;

    public function __construct($year = null, $month = null)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function collection()
    {
        // Query dasar untuk order yang sudah dibayar
        $query = Order::where('payment_status', 'paid');

        // Filter berdasarkan tahun jika ada
        if ($this->year) {
            $query->whereYear('created_at', $this->year);
        }

        // Filter berdasarkan bulan jika ada
        if ($this->month) {
            $query->whereMonth('created_at', $this->month);
        }

        // Ambil data order
        $orders = $query->get();

        // Transformasi data untuk export
        $data = new Collection();

        // Tambahkan header total
        $total = $query->sum('final_price');
        $data->push([
            'Report Period' => $this->month ? 
                "Month {$this->month} of {$this->year}" : 
                "Year {$this->year}",
            'Total Revenue' => number_format($total, 2),
            '',
            '',
            '',
            '',
        ]);

        // Tambahkan baris kosong
        $data->push([]);

        // Tambahkan header detail
        $data->push([
            'Order ID',
            'Customer Name',
            'Date',
            'Total Price',
            'Payment Status'
        ]);

        // Tambahkan data order
        foreach ($orders as $order) {
            $data->push([
                $order->id,
                $order->user->name ?? 'N/A',
                $order->created_at->format('Y-m-d H:i:s'),
                number_format($order->final_price, 2),
                $order->payment_status
            ]);
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'Order Report Details',
            'Total Revenue',
            '',
            '',
            '',
            '',
        ];
    }

    public function title(): string
    {
        $period = $this->month ? 
            "Month {$this->month} of {$this->year}" : 
            "Year {$this->year}";
        return "Order Report - {$period}";
    }
}