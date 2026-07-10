<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\JobListing;
use App\Models\User;
use App\Notifications\SystemNotification;

class JobController extends Controller
{ 

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'category_id' => 'required', 
        'location' => 'nullable|string',
        'salary_range' => 'nullable|string',
        'type' => 'required',
        'deadline' => 'nullable|date',
        'vacancy' => 'nullable|integer', 
    ]);

    $job = JobListing::create([
    'user_id' => auth()->id(),
    'title' => $request->title,
    'description' => $request->description,
    'category' => $request->category_id,
    'location' => $request->location,
    'salary_range' => $request->salary_range,
    'type' => $request->type,
    'deadline' => $request->deadline,
    'vacancy' => $request->vacancy ?? 1,
]);

$admins = User::where('role','admin')->get();

foreach($admins as $admin)
{
    $admin->notify(
        new SystemNotification(
            'New Job Posted',
            $job->title,
            route('admin.jobs')
        )
    );
}
    
    return redirect()->back()->with('success', 'Job posted successfully!');
}

    public function index(Request $request) 
    {
        $query = Job::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $jobs = $query->latest()->paginate(10);

        $categories = collect([
            (object)['id' => 'IT & Software', 'name' => 'IT & Software'],
            (object)['id' => 'Marketing', 'name' => 'Marketing'],
            (object)['id' => 'Design', 'name' => 'Design'],
            (object)['id' => 'Accounts', 'name' => 'Accounts'],
        ]);

        return view('jobs.index', compact('jobs', 'categories'));
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }
public function create()
{
    $categories = \App\Models\Category::all();

    $jobs = Job::with('category')
    ->where('user_id', auth()->id())
    ->latest()
    ->get();
    return view('jobs.create', compact('jobs', 'categories'));
}

public function edit(Job $job)
{
 
    if ($job->user_id !== auth()->id()) {
        abort(403);
    }

    $categories = \App\Models\Category::all();

    return view('jobs.edit', compact('job', 'categories'));
}

public function update(Request $request, $id)
{
    $job = JobListing::findOrFail($id);

  
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'category_id' => 'required',
        'location' => 'nullable|string',
        'salary_range' => 'nullable|string',
        'type' => 'required',
        'deadline' => 'nullable|date',
        'vacancy' => 'nullable|integer', 
    ]);

    $job->update([
        'title' => $request->title,
        'description' => $request->description,
        'category' => $request->category_id, 
        'location' => $request->location,
        'salary_range' => $request->salary_range,
        'type' => $request->type,
        'deadline' => $request->deadline,
        'vacancy' => $request->vacancy, 
    ]);

    return redirect()->route('dashboard')->with('success', 'Job updated successfully!');
}

}