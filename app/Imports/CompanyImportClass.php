<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Company;

class CompanyImportClass implements ToModel
{

    public function model(array $row)
    {
        return new Company([
            'nama' => $row[1],
            'email' => $row[2],
            'logo' => $row[3],
            'website' => $row[4],
            'created_by' => $row[6],
            'updated_by' => $row[8]
        ]);
    }

    public function chunkSize(): int
    {
        return 10;
    }
}
