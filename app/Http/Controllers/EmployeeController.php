<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employess = Employee::paginate(5);
        $company = Company::all();

        return view('employess.index', ['employess' => $employess, 'company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $company = Company::all();

        return view('employess.create', ['company' => $company]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //
         $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'company' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

         if ($validator->fails()) {
            return Redirect::to('employess/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $employe = new Employee;
            

            
            $employe->nama       = $request->input('name');
            $employe->email      = $request->input('email');
            $employe->company    = $request->input('company');
            $employe->created_by = \Auth::user()->id;
            $employe->updated_by = \Auth::user()->id;
            $employe->save();

            // redirect
            $request->session()->flash('message', 'Employes added successfully');
            return Redirect::to('employess');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $employess = Employee::find($id);

        return view('employess.index', ['employess' => $employess]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        
        $employess = Employee::find($id);
        $company = Company::find($employess->company);
        
        
        return view('employess.edit', ['employess' => $employess, 'company' => $company, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'company' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

         if ($validator->fails()) {
            return Redirect::to('employess/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $employe = Employee::find($id);            

            
            $employe->nama       = $request->input('name');
            $employe->email      = $request->input('email');
            $employe->company    = $request->input('company');
            $employe->created_by = \Auth::user()->id;
            $employe->updated_by = \Auth::user()->id;
            $employe->save();

            // redirect
            $request->session()->flash('message', 'Employes updated successfully');
            return Redirect::to('employess');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        //
        $employess = Employee::find($id);
        $employess->delete();

        // redirect
        $request->session()->flash('message', 'Employes deleted successfully');
        return Redirect::to('employess');
    }
}
