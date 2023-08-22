<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use Carbon\Carbon;

class EmployeeController extends Controller
{
 
    public function index()
    {
        $company =  Company::all();
        return view('pages.add_employer',compact('company'));
        
    }

    public function create()
    {
        //
    }

    // public function store(EmployeeRequest $request)
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:11|max:11',
        ]);

        Employee::insert([
            'company_id' => $request->company_name,
            'f_name' => $request->first_name,
            'l_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);
        session()->flash('success', 'Data has been saved.');
        return redirect()->route('dashboard');
    }

    public function show(Employee $employee)
    {
        //
    }

    public function edit($id)
    {
        $em = Employee::findOrFail($id);
        $company =  Company::all();
        return view('pages.edit_employer',compact('em','company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id,Employee $employee)
    {
        $request->validate([
            'company_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:11|max:11',
        ]);

        Employee::findOrFail($id)->update([
            'company_id' => $request->company_name,
            'f_name' => $request->first_name,
            'l_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);
        session()->flash('success', 'Data has been updated.');
        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        session()->flash('success', 'Data has been deleted.');
        return redirect()->route('dashboard');
    }
}
