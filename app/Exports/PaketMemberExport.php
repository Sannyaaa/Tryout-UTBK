<?php

namespace App\Exports;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PaketMemberExport implements FromCollection, WithHeadings, WithMapping
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
            'Image',
            'Nama',
            'Harga',
            'Tryout',
            'Bimbel',
            'Created At',
            'Updated At',
        ];
    }

    public function map($paket): array
    {
        Log::info('Exporting paket: ', [$paket]); // Log data paket
        return [
            $paket->id ?? 'N/A',
            $paket->image ?? 'N/A',
            $paket->name ?? 'N/A',
            $paket->price ?? 'N/A',
            $paket->tryout->name ?? 'N/A',
            $paket->bimbel->name ?? 'N/A',
            $paket->created_at->format('j F Y H:i:s') ?? 'N/A',
            $paket->updated_at->format('j F Y H:i:s') ?? 'N/A',
        ];
    }
}
