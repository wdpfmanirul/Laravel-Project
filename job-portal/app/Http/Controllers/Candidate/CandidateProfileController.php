<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CandidateProfile;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateTraining;
use App\Models\CandidateDocument;

class CandidateProfileController extends Controller
{
    
    public function personal()
    {
        $profile = CandidateProfile::firstOrCreate([
            'user_id' => auth()->id()
        ]);

        return view('candidate.profile.personal', compact('profile'));
    }

public function savePersonal(Request $request)
{
  
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'gender' => 'nullable|in:Male,Female,Others',
        'date_of_birth' => 'nullable|date',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $profile = CandidateProfile::firstOrCreate([
        'user_id' => auth()->id()
    ]);

    auth()->user()->update([
        'name' => $request->name
    ]);

    
    $profile->update([
        'father_name'      => $request->father_name,
        'mother_name'      => $request->mother_name,
        'gender'           => $request->gender,
        'date_of_birth'    => $request->date_of_birth,
        'nationality'      => $request->nationality,
        'marital_status'   => $request->marital_status,
        'phone'            => $request->phone,
        'alternate_mobile' => $request->alternate_mobile,
        'district'         => $request->district,
        'thana'            => $request->thana,
        'post_office'      => $request->post_office,
        'present_address'  => $request->present_address, // DB Column Match
    ]);

   
    if ($request->hasFile('photo')) {
       
        if ($profile->photo && \Storage::disk('public')->exists($profile->photo)) {
            \Storage::disk('public')->delete($profile->photo);
        }

        $photoPath = $request->file('photo')->store('candidate/photos', 'public');
        $profile->update(['photo' => $photoPath]);
    }

    return redirect()->route('candidate.profile.education')->with('success', 'Step 1 completed!');
}

   
public function education()
{
    $profile = CandidateProfile::where('user_id', auth()->id())->first();

    $educations = $profile
        ? $profile->educations
        : [];

    return view('candidate.profile.education', compact('profile','educations'));
}

public function storeEducation(Request $request)
{
    $profile = CandidateProfile::where('user_id', auth()->id())->first();

    
    CandidateEducation::where('candidate_profile_id', $profile->id)->delete();

    foreach ($request->qualification_level as $i => $val) {
        CandidateEducation::create([
            'candidate_profile_id' => $profile->id,
            'qualification_level' => $request->qualification_level[$i],
            'group_subject' => $request->group_subject[$i] ?? null,
            'institution_name' => $request->institution_name[$i],
            'passing_year' => $request->passing_year[$i],
            'roll_registration' => $request->roll_registration[$i] ?? null,
            'cgpa_grade' => $request->cgpa_grade[$i] ?? null,
        ]);
    }

     return redirect()->route('candidate.profile.experience');
}

    public function saveEducation(Request $request)
    {
        $profile = CandidateProfile::where('user_id', auth()->id())
            ->first();

        CandidateEducation::where(
            'candidate_profile_id',
            $profile->id
        )->delete();

        if ($request->qualification_level) {

            foreach ($request->qualification_level as $key => $value) {

                CandidateEducation::create([

                    'candidate_profile_id' => $profile->id,

                    'qualification_level' =>
                        $request->qualification_level[$key],

                    'group_subject' =>
                        $request->group_subject[$key],

                    'institution_name' =>
                        $request->institution_name[$key],

                    'board_university' =>
                        $request->board_university[$key],

                    'passing_year' =>
                        $request->passing_year[$key],

                    'roll_registration' =>
                        $request->roll_registration[$key],

                    'cgpa_grade' =>
                        $request->cgpa_grade[$key],
                ]);
            }
        }

        return redirect()->route('candidate.profile.experience')->with('success', 'Step 2 completed!');
    }


public function experience()
{
    $profile = CandidateProfile::where('user_id', auth()->id())->first();

    $experiences = $profile ? $profile->experiences : [];

    return view('candidate.profile.experience', compact('profile', 'experiences'));
}

public function storeExperience(Request $request)
{
    
    $request->validate([
        'company_name.*' => 'required|string|max:255',
        'job_title.*' => 'required|string|max:255',
        'employment_type.*' => 'nullable|string',
        'start_date.*' => 'required|date',
        'end_date.*' => 'nullable|date|after_or_equal:start_date.*',
        'responsibilities.*' => 'nullable|string',
    ]);

    $profile = CandidateProfile::where('user_id', auth()->id())->firstOrFail();

    DB::transaction(function () use ($request, $profile) {
       
        CandidateExperience::where('candidate_profile_id', $profile->id)->delete();

        $company_names = $request->input('company_name', []);

        foreach ($company_names as $index => $name) {
            if (empty($name)) continue;

            CandidateExperience::create([
                'candidate_profile_id' => $profile->id,
                'company_name'       => $name,
                'job_title'          => $request->job_title[$index] ?? null,
                'employment_type'    => $request->employment_type[$index] ?? null,
                'start_date'         => $request->start_date[$index] ?? null,
                'end_date'           => isset($request->currently_working[$index]) ? null : ($request->end_date[$index] ?? null),
                'currently_working'  => isset($request->currently_working[$index]) ? 1 : 0,
                'responsibilities'   => $request->responsibilities[$index] ?? null,
            ]);
        }
    });

   return redirect()->route('candidate.profile.training')->with('success', 'Step 3 completed!');
}
   
    public function training()
{
    $profile = CandidateProfile::where('user_id', auth()->id())->first();
    $trainings = CandidateTraining::where('candidate_profile_id', $profile->id)->get();
    return view('candidate.profile.training', compact('trainings'));
}
public function storeTraining(Request $request)
{
    $profile = CandidateProfile::where('user_id', auth()->id())->first();

   
    CandidateTraining::where('candidate_profile_id', $profile->id)->delete();

    $titles = $request->input('training_title', []);
    foreach ($titles as $index => $title) {
        if (empty($title)) continue;
        CandidateTraining::create([
            'candidate_profile_id' => $profile->id,
            'training_title' => $title,
            'institution' => $request->institution[$index] ?? null,
            'duration' => $request->duration[$index] ?? null,
            'passing_year' => $request->passing_year[$index] ?? null,
        ]);
    }

    return redirect()->route('candidate.profile.preview');
}

public function preview()
    {
        $profile = CandidateProfile::where('user_id', auth()->id())->first();

        $educations = $profile
            ? CandidateEducation::where('candidate_profile_id', $profile->id)->get()
            : collect();

        $experiences = $profile
            ? CandidateExperience::where('candidate_profile_id', $profile->id)->get()
            : collect();

        return view('candidate.profile.preview', compact('profile', 'educations', 'experiences'));
    }

    public function finalSubmit(Request $request)
{
   
    $profile = CandidateProfile::where('user_id', auth()->id())->firstOrFail();

    
    return redirect()->route('candidate.dashboard')->with('success', 'Congratulations! Your professional profile has been submitted successfully.');
}

public function cv()
{
    $profile = CandidateProfile::with([
        'educations',
        'experiences',
        'documents',
        'user'
    ])->where('user_id', auth()->id())->first();

    return view('candidate.cv.index', compact('profile'));
}

}

