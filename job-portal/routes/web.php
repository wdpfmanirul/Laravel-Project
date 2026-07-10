<?php

use Illuminate\Support\Facades\Route;

use App\Models\Job;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Employer\EmployerDashboardController;
use App\Http\Controllers\Candidate\CandidateDashboardController;
use App\Http\Controllers\Candidate\CandidateProfileController;
use App\Http\Controllers\Candidate\CandidateResumeController;
use App\Http\Controllers\Employer\CompanyProfileController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCandidateController;
use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Admin\AdminJobController;
use App\Http\Controllers\Admin\AdminApplicationController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminPasswordController;


// ================= PUBLIC =================
Route::get('/', function () {

    $categories = Category::withCount('jobs')->get();
    $jobs = Job::latest()->take(6)->get();

    return view('welcome', compact('categories', 'jobs'));
})->name('home');

Route::get('/categories/{slug}', function ($slug) {
    return "Showing jobs for category: " . $slug;
})->name('categories.show');

Route::get('/companies', [CompanyController::class, 'index'])
    ->name('companies.index');

Route::get('/company/{id}/jobs', [CompanyController::class, 'companyJobs'])
    ->name('companies.jobs');

    
// ================= AUTH =================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['auth', 'verified'])->get('/dashboard', function () {

    if (auth()->user()->role === 'employer') {
        return redirect()->route('employer.dashboard');
    }

    return redirect()->route('candidate.dashboard');

})->name('dashboard');

    // Laravel default profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Jobs
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

    // Apply
    Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])
        ->name('jobs.apply');



});


// ================= EMPLOYER =================
Route::middleware(['auth', 'role:employer'])
    ->prefix('employer')
    ->name('employer.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [EmployerDashboardController::class, 'index'])
            ->name('dashboard');

        // Job
        Route::get('/jobs/create', [JobController::class, 'create'])
            ->name('jobs.create');

        Route::post('/jobs', [JobController::class, 'store'])
            ->name('jobs.store');


        Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');

        Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');

        Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
        
        // Applications (All)
        Route::get('/applications', [EmployerDashboardController::class, 'allApplications'])
            ->name('applications');

        // Single Job Applications
        Route::get('/jobs/{job}/applications', [EmployerDashboardController::class, 'viewApplications'])
            ->name('jobs.applications');

        // ================= SELECTION FLOW =================

        // Choice (1st / 2nd / 3rd)
        Route::post('/applications/{id}/choice', [EmployerDashboardController::class, 'setChoice'])
            ->name('applications.choice');

        // Chosen Applicants
        Route::get('/chosen-applicants', [EmployerDashboardController::class, 'chosenApplicants'])
            ->name('chosen.applicants');

        // Shortlist
        Route::post('/applications/{id}/shortlist', [EmployerDashboardController::class, 'shortlist'])
            ->name('applications.shortlist');

        // Shortlisted Applicants
        Route::get('/shortlisted-applicants', [EmployerDashboardController::class, 'shortlistedApplicants'])
    ->name('shortlisted.applicants');
    
    Route::post('/applications/{id}/send-interview', [EmployerDashboardController::class, 'sendInterviewMessage'])
    ->name('applications.sendInterview');

        // Interview Send (FINAL SINGLE ROUTE)
        Route::post('/applications/{id}/interview', [EmployerDashboardController::class, 'sendInterviewMessage'])
            ->name('applications.interview');

        // Candidate CV
        Route::get('/candidate/{user}/cv', [EmployerDashboardController::class, 'viewCandidateCv'])
            ->name('candidate.cv');

             Route::get('/company-profile', [CompanyProfileController::class, 'edit'])
    ->name('company.profile');

    Route::post('/company-profile', [CompanyProfileController::class, 'update'])
        ->name('company.profile.update');


     Route::get('/finalized-candidates', [EmployerDashboardController::class, 'finalizedCandidates'])
    ->name('finalized.candidates');

        Route::post('/applications/{id}/mark-joined',[EmployerDashboardController::class, 'markJoined'])
        ->name('applications.joined');

    Route::post('/applications/{id}/reject', [EmployerDashboardController::class, 'rejectCandidate']
    )->name('applications.reject');

    Route::post('/applications/{id}/appointment-letter',[EmployerDashboardController::class, 'sendAppointmentLetter']
    )->name('applications.appointment');
       
    });


// ================= ADMIN =================
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::delete('/admin/jobs/{job}', [AdminController::class, 'destroyJob'])
        ->name('admin.jobs.delete');

    Route::get('/admin/candidates', [AdminCandidateController::class, 'index'])
        ->name('admin.candidates');

    Route::get('/admin/candidates/{id}', [AdminCandidateController::class, 'show'])
        ->name('admin.candidates.show');

    Route::delete('/admin/candidates/{id}', [AdminCandidateController::class, 'destroy'])
        ->name('admin.candidates.delete');

    Route::get('/admin/companies', [AdminCompanyController::class, 'index'])
    ->name('admin.companies');

    Route::get('/admin/companies/{id}', [AdminCompanyController::class, 'show'])
        ->name('admin.companies.show');

    Route::delete('/admin/companies/{id}', [AdminCompanyController::class, 'destroy'])
        ->name('admin.companies.delete');


    Route::get('/admin/jobs', [AdminJobController::class, 'index'])
    ->name('admin.jobs');

    Route::get('/admin/jobs/{id}', [AdminJobController::class, 'show'])
        ->name('admin.jobs.show');

    Route::delete('/admin/jobs/{id}', [AdminJobController::class, 'destroy'])
        ->name('admin.jobs.delete');

    Route::get('/admin/applications', [AdminApplicationController::class,'index'])
    ->name('admin.applications');

    Route::get('/admin/applications/{id}', [AdminApplicationController::class,'show'])
        ->name('admin.applications.show');

    Route::post('/admin/applications/{id}/approve',[AdminApplicationController::class,'approve'])
        ->name('admin.applications.approve');

    Route::post('/admin/applications/{id}/reject', [AdminApplicationController::class,'reject'])
        ->name('admin.applications.reject');

    Route::delete('/admin/applications/{id}', [AdminApplicationController::class,'destroy'])
        ->name('admin.applications.delete');
   

    Route::prefix('admin') ->name('admin.') ->middleware(['auth','role:admin']) ->group(function () {
        Route::resource('categories', AdminCategoryController::class );

    });


    Route::prefix('admin') ->middleware(['auth','role:admin'])->name('admin.') ->group(function () {

        Route::get('/notifications', [AdminNotificationController::class,'index']
        )->name('notifications');

        Route::post('/notifications/read-all', [AdminNotificationController::class,'markAllRead']
        )->name('notifications.read.all');

        Route::post('/notifications/{id}/read',[AdminNotificationController::class,'markAsRead']
        )->name('notifications.read');
});

Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get( '/settings/profile', [AdminProfileController::class,'edit']
        )->name('settings.profile');

        Route::post( '/settings/profile', [AdminProfileController::class,'update']
        )->name('settings.profile.update');

        Route::get( '/settings/password', [AdminPasswordController::class,'edit']
        )->name('settings.password');

        Route::post('/settings/password', [AdminPasswordController::class,'update']
        )->name('settings.password.update');

});

});


// ================= AJAX =================
Route::get('/api/districts/{division_id}', [CandidateProfileController::class, 'getDistricts']);
Route::get('/api/upazilas/{district_id}', [CandidateProfileController::class, 'getUpazilas']);



// ================= CANDIDATE MODULE =================
Route::middleware(['auth', 'role:candidate'])
    ->prefix('candidate')
    ->name('candidate.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [CandidateDashboardController::class, 'index'])
            ->name('dashboard');

        // ================= PROFILE WIZARD =================

        // STEP 1 → Personal
        Route::get('/profile/personal', [CandidateProfileController::class, 'personal'])
            ->name('profile.personal');

        Route::post('/profile/personal', [CandidateProfileController::class, 'savePersonal'])
            ->name('profile.personal.save');


        // STEP 2 → Education
        Route::get('/profile/education', [CandidateProfileController::class, 'education'])
            ->name('profile.education');

        Route::post('/profile/education', [CandidateProfileController::class, 'storeEducation'])
            ->name('profile.education.store');

        Route::delete('/profile/education/{id}', [CandidateProfileController::class, 'deleteEducation'])
            ->name('profile.education.delete');

        // STEP 3 → Experience
        Route::get('/profile/experience', [CandidateProfileController::class, 'experience'])
            ->name('profile.experience');

        // এখানে ডুপ্লিকেট পোস্ট রুট ছিল, আমি একটি ক্লীন করে দিয়েছি
        Route::post('/profile/experience', [CandidateProfileController::class, 'storeExperience'])
            ->name('profile.experience.store');


        // STEP 4 → Training (এখানে নাম পরিবর্তন করা হয়েছে সামঞ্জস্য রাখার জন্য)
        Route::get('/profile/training', [CandidateProfileController::class, 'training'])
            ->name('profile.training'); // আগে শুধু 'training' ছিল, এখন 'profile.training'

        Route::post('/profile/training', [CandidateProfileController::class, 'storeTraining'])
            ->name('profile.training.store'); // আগে 'training.store' ছিল


        // STEP 5 → PREVIEW
        Route::get('/profile/preview', [CandidateProfileController::class, 'preview'])
            ->name('profile.preview');

        // FINAL SUBMIT
        Route::post('/profile/submit', [CandidateProfileController::class, 'finalSubmit'])
            ->name('profile.submit');

        // CV PAGE
        Route::get('/cv', [CandidateProfileController::class, 'cv'])
            ->name('cv');

            // Applied Jobs
        Route::get('/applied-jobs', [CandidateDashboardController::class, 'appliedJobs'])
            ->name('applied.jobs');

            // Saved Jobs Page
        Route::get('/saved-jobs', [CandidateDashboardController::class, 'savedJobs'])
            ->name('saved.jobs');

        // Save Job
        Route::post('/save-job/{jobId}', [CandidateDashboardController::class, 'saveJob'])
            ->name('save.job');

        // Unsave Job
        Route::delete('/unsave-job/{jobId}', [CandidateDashboardController::class, 'unsaveJob'])
            ->name('unsave.job');
       
       // Company Preview
        Route::get('/company/{id}', [CandidateDashboardController::class, 'companyShow'])
            ->name('company.show');

        // Interview Schedule
        Route::get('/interview-schedule', [CandidateDashboardController::class, 'interviewSchedule'])
            ->name('interview.schedule');

    Route::get('/notifications', [CandidateDashboardController::class, 'notifications'])
    ->name('notifications');


    });

    Route::get('/mail-preview/{id}', function ($id) {
    $application = App\Models\Application::with(['user', 'job'])->findOrFail($id);

    return view('emails.interview-invitation', compact('application'));
});


Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::middleware('guest')->group(function () {

            Route::get('/login', [AdminLoginController::class,'create'])
                ->name('login');

            Route::post('/login', [AdminLoginController::class,'store'])
                ->name('login.store');
        });

        Route::middleware(['auth','role:admin'])->group(function () {

            Route::post('/logout', [AdminLoginController::class,'destroy'])
                ->name('logout');
        });
    });

    

// ================= AUTH =================
require __DIR__.'/auth.php';