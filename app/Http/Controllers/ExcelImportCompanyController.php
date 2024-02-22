<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\CompanyImportClass;

class ExcelImportCompanyController extends Controller
{
    //
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
 
        $file = $request->file('file');
        
        Excel::import(new CompanyImportClass, $file);
 
        return redirect()->back()->with('message', 'Excel file imported successfully!');
    }
}
