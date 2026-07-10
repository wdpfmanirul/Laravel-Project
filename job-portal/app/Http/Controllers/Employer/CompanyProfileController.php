<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;

class CompanyProfileController extends Controller
{
    public function edit()
    {
        $company = CompanyProfile::firstOrCreate(
            ['user_id' => auth()->id()],
            ['company_name' => '']
        );

        return view('employer.company-profile', compact('company'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $company = CompanyProfile::firstOrCreate([
            'user_id' => auth()->id()
        ]);

        if ($request->hasFile('company_logo')) {

            $logo = $request->file('company_logo')->store('company-logos', 'public');

            $company->company_logo = $logo;
        }

        $company->company_name = $request->company_name;
        $company->company_email = $request->company_email;
        $company->company_phone = $request->company_phone;
        $company->industry_type = $request->industry_type;
        $company->company_size = $request->company_size;
        $company->website = $request->website;
        $company->founded_year = $request->founded_year;
        $company->division = $request->division;
        $company->district = $request->district;
        $company->thana = $request->thana;
        $company->address = $request->address;
        $company->mission = $request->mission;
        $company->vision = $request->vision;
        $company->description = $request->description;
        $company->facebook = $request->facebook;
        $company->linkedin = $request->linkedin;
        $company->youtube = $request->youtube;
        $company->total_employees = $request->total_employees;

        $company->save();

        return back()->with('success', 'Company profile updated successfully.');
    }
}