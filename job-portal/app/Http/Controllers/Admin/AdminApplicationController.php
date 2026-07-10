<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;

class AdminApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with([
            'user',
            'job'
        ])
        ->latest()
        ->paginate(20);

        return view(
            'admin.applications.index',
            compact('applications')
        );
    }

    public function show($id)
    {
        $application = Application::with([
            'user',
            'candidateProfile',
            'job'
        ])->findOrFail($id);

        return view(
            'admin.applications.show',
            compact('application')
        );
    }

    public function approve($id)
    {
        $application = Application::findOrFail($id);

        $application->update([
            'final_status' => 'approved'
        ]);

        return back()->with(
            'success',
            'Application approved.'
        );
    }

    public function reject($id)
    {
        $application = Application::findOrFail($id);

        $application->update([
            'final_status' => 'rejected'
        ]);

        return back()->with(
            'success',
            'Application rejected.'
        );
    }

    public function destroy($id)
    {
        Application::findOrFail($id)->delete();

        return redirect()
            ->route('admin.applications')
            ->with(
                'success',
                'Application deleted successfully.'
            );
    }
}