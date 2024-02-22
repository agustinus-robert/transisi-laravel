<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Employee;

class EmployesImportClass implements ToModel
{
     public function model(array $row)
    {
        return new Employee([
            'nama' => $row[1],
            'company' => $row[2],
            'email' => $row[3],
            'created_by' => $row[5],
            'updated_by' => $row[7]
        ]);
    }

    public function chunkSize(): int
    {
        return 10;
    }
}
