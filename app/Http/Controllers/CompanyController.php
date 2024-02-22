<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $company = Company::paginate(5);
        return view('company.index', ['company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'logo' => 'required|mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100|max:2048',
            'website' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

         if ($validator->fails()) {
            return Redirect::to('company/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $company = new Company;
            
            $imageName = '';
            if ($request->hasFile('logo')) {
                $imageName = time().$request->file('logo')->getClientOriginalName();  
                Storage::disk('local')->put('company/'.$imageName, file_get_contents($request->logo));
            }

            
            $company->nama       = $request->input('name');
            $company->email      = $request->input('email');
            $company->logo       = 'storage/app/company/'.$imageName;
            $company->website    = $request->input('website');
            $company->created_by = \Auth::user()->id;
            $company->updated_by = \Auth::user()->id;
            $company->save();

            // redirect
            $request->session()->flash('message', 'Company added successfully');
            return Redirect::to('company');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    { 
        if(is_numeric($id)){
            $company = Company::find($id);
        } else {
            $company = Company::where('nama','like','%'.$request->q.'%')->paginate(5, '*', 'page', $request->page)->toArray();    
        }
        
        
        return $company;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
         $company = Company::find($id);

        return view('company.edit', ['company' => $company, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'logo' => 'nullable|mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100|max:2048',
            'website' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
     

         if ($validator->fails()) {
            return Redirect::to('company/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            
            $imageName = '';
            if ($request->hasFile('logo')) {
                $imageName = time().$request->file('logo')->getClientOriginalName();  
                Storage::disk('local')->put('company/'.$imageName, file_get_contents($request->logo));
            }

            $company = Company::find($id);

            $company->nama       = $request->input('name');
            $company->email      = $request->input('email');
            
            if ($request->hasFile('logo')) {
                $company->logo       = 'storage/app/company/'.$imageName;
            }

            $company->website    = $request->input('website');
//            $company->created_by = \Auth::user()->id;
            $company->updated_by = \Auth::user()->id;
            $company->save();

            // redirect
            $request->session()->flash('message', 'Company updated successfully');
            return Redirect::to('company');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $company = Company::find($id);
        $company->delete();

        // redirect
        $request->session()->flash('message', 'Company deleted successfully');
        return Redirect::to('company');
    }
}
