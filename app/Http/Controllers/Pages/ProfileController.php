<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('profile.index', ['user' => auth()->user()]);
    }

    public function edit(): View
    {
        return view('profile.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $user->update($validated);

        if ($user->isStudent() && $user->profile) {
            $profileData = $request->validate([
                'age' => ['nullable', 'integer', 'min:18', 'max:100'],
                'is_smoking' => ['sometimes', 'boolean'],
                'is_pets' => ['sometimes', 'boolean'],
                'is_guests' => ['sometimes', 'boolean'],
            ]);
            $user->profile->update($profileData);
        }

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }

    public function show(User $user): View
    {
        $this->authorize('view', $user);
        return view('profile.show', ['user' => $user]);
    }
}
