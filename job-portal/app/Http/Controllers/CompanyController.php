<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Job;


class CompanyController extends Controller
{
    public function index()
    {
        $companies = CompanyProfile::latest()->get();

        return view('companies.index', compact('companies'));
    }

    public function companyJobs($id)
{
    $company = CompanyProfile::where('user_id', $id)->firstOrFail();

    $jobs = Job::where('user_id', $id)
        ->where('status', 'active')
        ->latest()
        ->get();

    return view('companies.jobs', compact('company', 'jobs'));
}
}