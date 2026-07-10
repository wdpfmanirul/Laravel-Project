<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminCandidateController extends Controller
{
    public function index()
    {
        $candidates = User::with('candidateProfile')
            ->where('role', 'candidate')
            ->latest()
            ->paginate(15);

        return view('admin.candidates.index', compact('candidates'));
    }

    public function show($id)
    {
        $candidate = User::with('candidateProfile')
            ->where('role', 'candidate')
            ->findOrFail($id);

        return view('admin.candidates.show', compact('candidate'));
    }

    public function destroy($id)
    {
        $candidate = User::findOrFail($id);

        if ($candidate->candidateProfile) {
            $candidate->candidateProfile->delete();
        }

        $candidate->delete();

        return redirect()
            ->route('admin.candidates')
            ->with('success', 'Candidate deleted successfully.');
    }
}