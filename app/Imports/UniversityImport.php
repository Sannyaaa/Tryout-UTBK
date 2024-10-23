<?php

namespace App\Imports;

use App\Models\University;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UniversityImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        //

        return new University([
            'id' => $row['id'], // pastikan kolom di excel sesuai
            'name' => $row['name'],
            'code' => $row['code'],
            'city' => $row['city'],
            'province' => $row['province'],
            'website' => $row['website'],
        ]);
    }
}
