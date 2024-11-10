<?php

namespace App\Exports;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TryoutExport implements FromCollection, WithHeadings, WithMapping
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
            'Name',
            'Gratis / Berbayar',
            'Biasa / Serentak',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Created At',
            'Updated At',
        ];
    }

    public function map($tryout): array
    {
        Log::info('Exporting tryout: ', [$tryout]); // Log data tryout
        return [
            $tryout->id ?? 'N/A',
            $tryout->name ?? 'N/A',
            $tryout->is_free ?? 'N/A',
            $tryout->is_together ?? 'N/A',
            date('j F Y', strtotime($tryout->start_date)) ?? 'N/A',
            date('j F Y', strtotime($tryout->end_date)) ?? 'N/A',
            $tryout->created_at->format('j F Y H:i:s') ?? 'N/A',
            $tryout->updated_at->format('j F Y H:i:s') ?? 'N/A',
        ];
    }
}
