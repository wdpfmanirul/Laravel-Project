<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;

class AdminCompanyController extends Controller
{
    public function index()
    {
        $companies = CompanyProfile::with('user')
            ->latest()
            ->paginate(15);

        return view(
            'admin.companies.index',
            compact('companies')
        );
    }

    public function show($id)
    {
        $company = CompanyProfile::with('user')
            ->findOrFail($id);

        return view(
            'admin.companies.show',
            compact('company')
        );
    }

    public function destroy($id)
    {
        $company = CompanyProfile::findOrFail($id);

        if ($company->user) {
            $company->user->delete();
        }

        $company->delete();

        return redirect()
            ->route('admin.companies')
            ->with(
                'success',
                'Company deleted successfully.'
            );
    }
}