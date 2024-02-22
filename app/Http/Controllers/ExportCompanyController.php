<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Company;

class ExportCompanyController extends Controller
{
    //
    public function getData(){
        $company = Company::all();

        $cmp = [];
        foreach($company as $index => $data){
            $mdcmp = (Object) [
                'id' => $data->nama,
                'name' => $data->nama,
                'email' => $data->email,
                'website' => $data->website
            ];

            array_push($cmp, $mdcmp);
        }

        $data = [
            "company" => $cmp
        ];

        $pdf = PDF::loadView('tableViewCompany', $data);
        $pdf->setOption('enable-local-file-access', true);
        return $pdf->stream('company.pdf');
    }
}
