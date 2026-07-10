<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\JobListing;
use App\Models\Application;
use App\Models\CandidateProfile;
use App\Models\SavedJob;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CompanyProfile;



class CandidateDashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();    

    $profile = CandidateProfile::where('user_id', $user->id)->first();   

    $savedJobsCount = SavedJob::where('user_id', $user->id)->count();

    $appliedJobsCount = Application::where('user_id', $user->id)->count();
   
    $educationCount = 0;
    $experienceCount = 0;

    if ($profile) {

        $educationCount = CandidateEducation::where(
            'candidate_profile_id',
            $profile->id
        )->count();

        $experienceCount = CandidateExperience::where(
            'candidate_profile_id',
            $profile->id
        )->count();
    }

    $interviewsCount = Application::where('user_id', auth()->id())
    ->whereNotNull('interview_date')
    ->count();
    

    $profileCompletion = 0;

    if ($profile) {

       
        if (!empty($profile->photo)) {
            $profileCompletion += 10;
        }
    
        if (!empty($profile->phone)) {
            $profileCompletion += 10;
        }
     
        if (!empty($profile->present_address)) {
            $profileCompletion += 10;
        }

        if (!empty($profile->district)) {
            $profileCompletion += 5;
        }

      
        if (!empty($profile->thana)) {
            $profileCompletion += 5;
        }

     
        if (!empty($profile->post_office)) {
            $profileCompletion += 5;
        }

     
        if (!empty($profile->age)) {
            $profileCompletion += 5;
        }

  
        if (!empty($profile->skills)) {
            $profileCompletion += 10;
        }

  
        if (!empty($profile->date_of_birth)) {
            $profileCompletion += 5;
        }


        if (!empty($profile->gender)) {
            $profileCompletion += 5;
        }


        if (!empty($profile->nationality)) {
            $profileCompletion += 5;
        }


        if (!empty($profile->marital_status)) {
            $profileCompletion += 5;
        }


        if (!empty($profile->father_name)) {
            $profileCompletion += 5;
        }


        if (!empty($profile->mother_name)) {
            $profileCompletion += 5;
        }

        if ($educationCount > 0) {
            $profileCompletion += 5;
        }


        if ($experienceCount > 0) {
            $profileCompletion += 5;
        }
    }

   

    if ($profileCompletion > 100) {
        $profileCompletion = 100;
    }

   

    $profileStrength = 'Weak';

    if ($profileCompletion >= 80) {
        $profileStrength = 'Excellent';
    } elseif ($profileCompletion >= 60) {
        $profileStrength = 'Strong';
    } elseif ($profileCompletion >= 40) {
        $profileStrength = 'Moderate';
    }

   

    $recommendedJobs = JobListing::latest()
        ->take(6)
        ->get();

    $notifications = auth()->user()->unreadNotifications;



    return view('dashboard.candidate', compact(
        'profile',
        'profileCompletion',
        'profileStrength',
        'recommendedJobs',
        'appliedJobsCount',
        'savedJobsCount',
        'interviewsCount',
        'notifications'
    ));
}

public function appliedJobs()
{
    $user = Auth::user();

    $applications = Application::with('job')
        ->where('user_id', $user->id)
        ->latest()
        ->get();

    return view('candidate.jobs.applied', compact('applications'));
}

public function saveJob($id)
{
    $user = Auth::user();

    $savedJob = SavedJob::where('user_id', $user->id)
        ->where('job_id', $id)
        ->first();

    if ($savedJob) {

        $savedJob->delete();

        return response()->json([
            'status' => 'unsaved'
        ]);

    } else {

        SavedJob::create([
            'user_id' => $user->id,
            'job_id' => $id,
        ]);

        return response()->json([
            'status' => 'saved'
        ]);
    }
}

public function unsaveJob($jobId)
{
    SavedJob::where('user_id', auth()->id())
        ->where('job_id', $jobId)
        ->delete();

    return back()->with('success', 'Saved job removed');
}
public function savedJobs()
{
    $savedJobs = SavedJob::with('job')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('candidate.jobs.saved', compact('savedJobs'));
}
public function companyShow($id)
{
    $company = CompanyProfile::where('user_id', $id)->firstOrFail();

    return view('candidate.company-preview', compact('company'));
}
public function interviewSchedule()
{
    $applications = Application::with([
        'job.company'
    ])
    ->where('user_id', auth()->id())
    ->where('interview_mail_sent', true)
    ->latest()
    ->get();

    return view('candidate.interview-schedule', compact('applications'));
}

public function notifications()
{
    $notifications = auth()->user()
    ->unreadNotifications()
    ->latest()
    ->take(10)
    ->get();

$unreadCount = auth()->user()
    ->unreadNotifications()
    ->count();

    return view('candidate.notifications', compact('notifications'));
    
}
}