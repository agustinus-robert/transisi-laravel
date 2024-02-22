<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class Select2 extends Controller
{
    //
    public function getCompany(Request $request){
    
        $company = Company::where('nama','like','%'.$request->search.'%')->paginate(2, ['*'], 'page', $request->page);
        return response()->json($company, 200);
        
        // $company = Company::paginate(2, '*', 'page', $request->page)->toArray();    
        return $company;
    }
}
