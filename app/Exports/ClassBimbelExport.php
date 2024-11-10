<?php

namespace App\Exports;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ClassBimbelExport implements FromCollection, WithHeadings, WithMapping
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
            'Bimbel',
            'Guru    ',
            'Sub Category',
            'Date',
            'Start Time',
            'End Time',
            'Created At',
            'Updated At',
        ];
    }

    public function map($class): array
    {
        Log::info('Exporting class: ', [$class]); // Log data class
        return [
            $class->id ?? 'N/A',
            $class->bimbel->name ?? 'N/A',
            $class->user->name ?? 'N/A',
            $class->sub_categories->name ?? 'N/A',
            date('j F Y', strtotime($class->date)) ?? 'N/A',
            date('h:i A', strtotime($class->start_time)) ?? 'N/A',
            date('h:i A', strtotime($class->end_time)) ?? 'N/A',
            $class->created_at->format('j F Y H:i:s') ?? 'N/A',
            $class->updated_at->format('j F Y H:i:s') ?? 'N/A',
        ];
    }
}
