<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'employer') {
            
            $jobs = Job::where('user_id', $user->id)
                       ->withCount('applications')
                       ->latest()
                       ->get();
            return view('dashboard', compact('jobs'));
        } else {
         
            $jobs = Job::latest()->get();
            $appliedCount = Application::where('user_id', $user->id)->count();
            return view('dashboard', compact('jobs', 'appliedCount'));
        }
    }


public function viewApplications(\App\Models\Job $job)
{
    
    if ($job->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $applications = $job->applications()->with('user.profile')->get();

    return view('dashboard.applications', compact('job', 'applications'));
}

    public function myApplications()
    {
        $applications = Application::where('user_id', auth()->id())
                                   ->with('job') 
                                   ->latest()
                                   ->get();

        return view('candidate.my-applications', compact('applications'));
    }
}