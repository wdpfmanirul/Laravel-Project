<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Application;
use App\Models\JobListing;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalCandidates = User::where('role', 'candidate')->count();

        $totalEmployers = User::where('role', 'employer')->count();

        $totalJobs = JobListing::count();

        $totalApplications = Application::count();

        $shortlisted = Application::where('is_shortlisted', 1)->count();

        $interviews = Application::where('interview_sent', 1)->count();

        $joined = Application::where('status', 'joined')->count();

        $rejected = Application::where('status', 'rejected')->count();

        $recentCandidates = User::where('role', 'candidate')
            ->latest()
            ->take(5)
            ->get();

        $recentEmployers = User::where('role', 'employer')
            ->with('companyProfile')
            ->latest()
            ->take(5)
            ->get();

        $recentJobs = JobListing::latest()
            ->take(5)
            ->get();

        $recentApplications = Application::with([
                'user',
                'candidateProfile'
            ])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalCandidates',
            'totalEmployers',
            'totalJobs',
            'totalApplications',
            'shortlisted',
            'interviews',
            'joined',
            'rejected',
            'recentCandidates',
            'recentEmployers',
            'recentJobs',
            'recentApplications'
        ));
    }
}