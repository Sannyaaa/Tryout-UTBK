<?php

namespace App\Exports;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromCollection, WithHeadings, WithMapping
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'ID',
            'No Invoice',
            'Paket',
            'Price',
            'Diskon',
            'Status',
            'Created At',
            'Updated At',
        ];
    }

    public function map($order): array
    {
        Log::info('Exporting order: ', [$order]); // Log data order
        return [
            $order->id ?? 'N/A',
            $order->invoice ?? 'N/A',
            $order->package_member->name ?? 'N/A',
            $order->final_price ?? 'N/A',
            $order->discount->name ?? 'N/A',
            $order->payment_status ?? 'N/A',
            $order->created_at->format('j F Y H:i:s') ?? 'N/A',
            $order->updated_at->format('j F Y H:i:s') ?? 'N/A',
        ];
    }
}
