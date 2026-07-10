<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\User; 

class ApplicationController extends Controller
{
    public function store(Request $request, Job $job) 
    {
       
        $request->validate([
            'expected_salary' => 'required|numeric|min:0',
        ]);

        $exists = Application::where('job_id', $job->id)
                            ->where('user_id', auth()->id())
                            ->exists();

        if ($exists) {
            return back()->with('error', 'You have already applied for this job!');
        }

        Application::create([
            'job_id' => $job->id,
            'user_id' => auth()->id(),
            'expected_salary' => $request->expected_salary,
            'status' => 'pending'
        ]);
$employer = User::find($job->user_id);

$employer->notify(
    new SystemNotification(
        'New Application',
        auth()->user()->name . ' applied for your job.',
        route('employer.applications')
    )
);
        return redirect()->route('candidate.dashboard')
                         ->with('success', 'Application submitted with Expected Salary: ৳' . $request->expected_salary);
    }
}