<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CompanyProfile;
use App\Models\JobListing;
use App\Models\Application;
use Carbon\Carbon;

class AdminReportController extends Controller
{
    public function index()
    {
       

        $totalCandidates = User::where('role', 'candidate')->count();

        $totalEmployers = User::where('role', 'employer')->count();

        $totalCompanies = CompanyProfile::count();

        $totalJobs = JobListing::count();

        $totalApplications = Application::count();

       

        $pendingApplications = Application::where('status', 'pending')->count();

        $shortlistedApplications = Application::where('is_shortlisted', 1)->count();

        $interviewSentApplications = Application::where('interview_sent', 1)->count();

        $joinedApplications = Application::where('final_status', 'joined')->count();

        $rejectedApplications = Application::where('final_status', 'rejected')->count();

       
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $newCandidatesThisMonth = User::where('role', 'candidate')
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->count();

        $newEmployersThisMonth = User::where('role', 'employer')
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->count();

        $newCompaniesThisMonth = CompanyProfile::whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->count();

        $jobsPostedThisMonth = JobListing::whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->count();

        $applicationsThisMonth = Application::whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->count();


        $topJobs = JobListing::withCount('applications')
            ->orderByDesc('applications_count')
            ->take(10)
            ->get();

        

        $latestJobs = JobListing::latest()
            ->take(10)
            ->get();

        
        $latestApplications = Application::with([
                'user',
                'job'
            ])
            ->latest()
            ->take(10)
            ->get();

        $latestCompanies = CompanyProfile::with('user')
            ->latest()
            ->take(10)
            ->get();

       
        $latestCandidates = User::where('role', 'candidate')
            ->latest()
            ->take(10)
            ->get();

        return view(
            'admin.reports.index',
            compact(
                'totalCandidates',
                'totalEmployers',
                'totalCompanies',
                'totalJobs',
                'totalApplications',

                'pendingApplications',
                'shortlistedApplications',
                'interviewSentApplications',
                'joinedApplications',
                'rejectedApplications',

                'newCandidatesThisMonth',
                'newEmployersThisMonth',
                'newCompaniesThisMonth',
                'jobsPostedThisMonth',
                'applicationsThisMonth',

                'topJobs',

                'latestJobs',
                'latestApplications',
                'latestCompanies',
                'latestCandidates'
            )
        );
    }
}