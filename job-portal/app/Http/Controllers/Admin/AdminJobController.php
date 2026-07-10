<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobListing;

class AdminJobController extends Controller
{
    public function index()
    {
        $jobs = JobListing::latest()
            ->paginate(15);

        return view(
            'admin.jobs.index',
            compact('jobs')
        );
    }

    public function show($id)
    {
        $job = JobListing::findOrFail($id);

        return view(
            'admin.jobs.show',
            compact('job')
        );
    }

    public function destroy($id)
    {
        $job = JobListing::findOrFail($id);

        $job->delete();

        return redirect()
            ->route('admin.jobs')
            ->with(
                'success',
                'Job deleted successfully.'
            );
    }
}