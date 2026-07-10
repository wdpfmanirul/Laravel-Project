<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CandidateEducation;
use Illuminate\Support\Facades\Auth;

class CandidateEducationController extends Controller
{
    public function index()
    {
        $educations = CandidateEducation::where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();

        return view('candidate.education.index', compact('educations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required',
        ]);

        CandidateEducation::create([
            'user_id' => Auth::id(),
            'level' => $request->level,
            'institute' => $request->institute,
            'board_or_university' => $request->board_or_university,
            'group_or_subject' => $request->group_or_subject,
            'result' => $request->result,
            'passing_year' => $request->passing_year,
        ]);

        return back()->with('success', 'Education added successfully');
    }

    public function destroy($id)
    {
        CandidateEducation::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return back()->with('success', 'Deleted');
    }
}