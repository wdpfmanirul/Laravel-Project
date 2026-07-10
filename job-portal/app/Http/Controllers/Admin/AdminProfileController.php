<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function edit()
    {
        return view('admin.settings.profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'], 
        ]);

     
        $user->name = $request->name;
        $user->email = $request->email;

        
        if ($request->hasFile('image')) {
         
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

           
            $path = $request->file('image')->store('profile_images', 'public');
            $user->image = $path;
        }

        $user->save();

        return back()->with(
            'success',
            'Profile updated successfully.'
        );
    }
}