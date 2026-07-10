<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CandidateProfile;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;
use App\Mail\InterviewInvitationMail;
use App\Notifications\CandidateNotification;
use App\Models\Category;


class EmployerDashboardController extends Controller
{
   
    public function index()
{
    $employerId = auth()->id();

    $jobIds = Job::where('user_id', $employerId)->pluck('id');

    $jobs = Job::with('jobCategory')
        ->withCount('applications')
        ->where('user_id', $employerId)
        ->latest()
        ->get();

    $totalJobs = $jobs->count();
    $activeJobs = $jobs->where('status', 'active')->count();
  
    $totalApplications = Application::whereIn('job_id', $jobIds)->count();
    
    $shortlistedCount = Application::whereIn('job_id', $jobIds)
        ->where('status', 'shortlisted')
        ->count();

    $interviewsCount = Application::whereIn('job_id', $jobIds)
        ->where('interview_mail_sent', 1)
        ->count();

    $joinedCount = Application::whereIn('job_id', $jobIds)
        ->where('final_status', 'joined')
        ->count();

    $rejectedCount = Application::whereIn('job_id', $jobIds)
        ->where('final_status', 'rejected')
        ->count();

    return view('dashboard.employer', compact(
        'jobs',
        'totalJobs',
        'totalApplications',
        'activeJobs',
        'shortlistedCount',
        'interviewsCount',
        'joinedCount',
        'rejectedCount'
    ));
}
    
    public function viewApplications(Job $job)
    {
       
        if ($job->user_id !== auth()->id()) {
            abort(403);
        }

        $applications = $job->applications()
            ->with('user.profile')
            ->latest()
            ->get();

        return view('employer.applications', compact('job', 'applications'));
    }

    
 function allApplications(Request $request)
{
    $category = $request->category;

    $categories = Category::whereIn('id',
        Job::where('user_id', auth()->id())
            ->pluck('category')   // this is category_id
    )->get();

    $applications = Application::with(['job', 'user'])
        ->whereHas('job', function ($query) use ($category) {

            $query->where('user_id', auth()->id());

            if ($category) {
                $query->where('category', $category);
            }

        })
        ->latest()
        ->get();

    return view('employer.applications', compact(
        'applications',
        'categories',
        'category'
    ));
}
    public function setChoice(Request $request, $id)
{
    $application = Application::findOrFail($id);

    if ($application->job->user_id != auth()->id()) {
        abort(403);
    }

    $request->validate([
        'choice_order' => 'required|in:1,2,3'
    ]);

    $application->choice_order = $request->choice_order;
    $application->save();

    return back()->with('success', 'Choice updated successfully.');
}
public function chosenApplicants()
{
    $applications = Application::with(['user', 'job'])
        ->whereNotNull('choice_order')
        ->whereHas('job', function ($query) {
            $query->where('user_id', auth()->id());
        })
        ->orderBy('choice_order', 'asc')
        ->orderBy('created_at', 'desc')        
        ->get();

    return view('employer.chosen-applicants', compact('applications'));
}
public function shortlist($id)
{
    $application = Application::findOrFail($id);

    if ($application->job->user_id != auth()->id()) {
        abort(403);
    }

    $application->is_shortlisted = true;

    $application->status = 'shortlisted';

    $application->save();

    $application->user->notify(
        new CandidateNotification(
            'Application Shortlisted',
            'Congratulations! Your application has been shortlisted.',
            route('candidate.interview.schedule')
        )
    );

    return back()->with('success', 'Applicant shortlisted.');
}

public function shortlistedApplicants()
{
    $applications = Application::with(['user.profile', 'job'])
    ->where('is_shortlisted', true)
    ->whereHas('job', function ($query) {
        $query->where('user_id', auth()->id());
    })
    ->orderBy('choice_order', 'asc')
    ->latest()
    ->get();

    return view('employer.shortlisted', compact('applications'));
}
public function sendInterviewMessage(Request $request, $id)
{
    $application = Application::with(['user', 'job'])->findOrFail($id);

    if ($application->job->user_id != auth()->id()) {
        abort(403);
    }

    $request->validate([
        'send_email' => 'required|email',
        'interview_message' => 'nullable|string',
        'interview_date' => 'required',
        'interview_time' => 'required',
        'interview_location' => 'required|string',
    ]);

    $company = \App\Models\CompanyProfile::where('user_id', auth()->id())->first();

    $application->update([
        'interview_message' => $request->interview_message,
        'interview_date' => $request->interview_date,
        'interview_time' => $request->interview_time,
        'interview_location' => $request->interview_location,
        'interview_mail_sent' => true,
    ]);

    try {
        Mail::to($request->send_email)
            ->send(new InterviewInvitationMail($application, $company));

    } catch (\Exception $e) {
        
    }

    $application->user->notify(
        new CandidateNotification(
            'Interview Scheduled',
            'Employer scheduled your interview.',
            route('candidate.interview.schedule')
        )
    );

    return back()->with('success', 'Interview invitation sent successfully.');
}
public function viewCandidateCv(User $user)
{
    $profile = CandidateProfile::with([
        'educations',
        'experiences',
        'trainings'
    ])->where('user_id', $user->id)->first();

    if (!$profile) {
        return back()->with('error', 'Candidate profile not found.');
    }
$user->notify(
    new CandidateNotification(
        'Employer Viewed Your CV',
        'An employer viewed your profile.',
        route('candidate.applied.jobs')
    )
);
    return view('employer.cv.show', compact('profile', 'user'));
}


public function finalizedCandidates()
{
    $applications = \App\Models\Application::with([
            'user',
            'job.category'
        ])
        ->where('is_shortlisted', true)
        ->whereHas('job', function ($query) {
            $query->where('user_id', auth()->id());
        })
        ->latest()
        ->get();

    return view('employer.candidate-finalized', compact('applications'));
}

public function markJoined($id)
{
    $application = Application::findOrFail($id);

    if ($application->job->user_id != auth()->id()) {
        abort(403);
    }

    $application->update([
        'final_status' => 'joined'
    ]);

    return back()->with('success', 'Candidate marked as joined.');
}
public function rejectCandidate($id)
{
    $application = Application::findOrFail($id);

    if ($application->job->user_id != auth()->id()) {
        abort(403);
    }

    $application->update([
        'final_status' => 'rejected'
    ]);

    return back()->with('success', 'Candidate rejected.');
}

public function sendAppointmentLetter($id)
{
    $application = Application::with([
        'user',
        'job'
    ])->findOrFail($id);

    if ($application->job->user_id != auth()->id()) {
        abort(403);
    }

    $company = \App\Models\CompanyProfile::where(
        'user_id',
        auth()->id()
    )->first();

    try {

        Mail::send(
            'emails.appointment-letter',
            [
                'application' => $application,
                'company' => $company
            ],
            function ($message) use ($application) {

                $message->to($application->user->email)
                    ->subject('Appointment Letter');

            }
        );

        $application->appointment_mail_sent = 1;
        $application->save();

    } catch (\Exception $e) {

        return back()->with(
            'error',
            'Email sending failed.'
        );

    }

    return back()->with(
        'success',
        'Appointment letter sent successfully.'
    );
}

}