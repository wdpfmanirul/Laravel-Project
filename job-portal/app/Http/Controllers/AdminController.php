<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Application;

class AdminController extends Controller
{
   public function index()
{
    $totalUsers = \App\Models\User::count();
    $totalJobs = \App\Models\Job::count();
    $totalApplications = \App\Models\Application::count();
    $jobs = \App\Models\Job::with('user')->latest()->get();

    return view('admin.dashboard', compact('totalUsers', 'totalJobs', 'totalApplications', 'jobs'));
}
    public function destroyJob(Job $job)
    {
    
        $job->delete();
        
   
        return back()->with('success', 'Job deleted successfully by admin.');
    }
}