<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::where('role','admin')->first();
        return view('pages.profile',compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'nullable|email',
        //     'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'website' => 'nullable|url',
        // ]);
        // dd($request);
    
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/logos');
            $logoPath = $logoPath;
        }
        $company = Company::findOrFail($id);
        $company->name =  $request->name;
        $company->email =  $request->email;
        $company->logo =  $logoPath;
        $company->website =  $request->website;
        $company->update();
        session()->flash('success', 'Data has been updated.');
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
