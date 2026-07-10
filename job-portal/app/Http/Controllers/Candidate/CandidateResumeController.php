<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CandidateProfile;
use Illuminate\Support\Facades\Auth;

class CandidateResumeController extends Controller
{
    public function index()
    {
        $profile = CandidateProfile::where('user_id', Auth::id())->first();
        return view('candidate.resume', compact('profile'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx'
        ]);

        $file = $request->file('cv');
        $name = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/cv'), $name);

        CandidateProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            ['cv' => $name]
        );

        return back()->with('message', 'Resume uploaded successfully');
    }
}