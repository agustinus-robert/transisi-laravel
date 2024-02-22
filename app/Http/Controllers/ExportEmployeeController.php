<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Company;
use App\Models\Employee;

class ExportEmployeeController extends Controller
{
    //
     public function getData(){
        $employee = Employee::all();

        $emp = [];
        foreach($employee as $index => $data){
            $mdemp = (Object) [
                'name' => $data->nama,
                'company' => Company::find($data->id)->nama,
                'email' => $data->email,
            ];

            array_push($emp, $mdemp);
        }

        $data = [
            "employee" => $emp
        ];

        $pdf = PDF::loadView('tableViewEmployee', $data);
        $pdf->setOption('enable-local-file-access', true);
        return $pdf->stream('company.pdf');
    }
}
