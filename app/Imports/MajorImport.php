<?php

namespace App\Imports;


use App\Models\Major;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MajorImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Major([
            'university_code' => $row['Kode_PT'],
            'name' => $row['Program Studi'],
            'code' => $row['Kode Prodi']
        ]);
    }
}
