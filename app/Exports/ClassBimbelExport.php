<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class ClassBimbelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
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
            'User ',
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
        return [
            $class->id,
            $class->bimbel->name, // Mengambil nama bimbel
            $class->user->name, // Mengambil nama user
            $class->sub_categories->name, // Mengambil nama sub kategori
            date('j F Y', strtotime($class->date)),
            date('h:i A', strtotime($class->start_time)),
            date('h:i A', strtotime($class->end_time)),
            $class->created_at->format('j F Y H:i:s'),
            $class->updated_at->format('j F Y H:i:s'),
        ];
    }
}
