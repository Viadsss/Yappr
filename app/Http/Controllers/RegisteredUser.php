<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class RegisteredUser extends Controller
{
    public function show(User $user)
    {
        // Eager load posts with their reactions and paginate them
        $posts = $user->posts()
            ->with('reactions')
            ->withCount('reactions')
            ->latest()
            ->paginate(9);

        return view('users.show', [
            'user' => $user->loadCount('posts'),
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $attributes = $request->validated();

        if ($request->hasFile('avatar')) {
            $attributes['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user = User::create($attributes);
        Auth::login($user);

        return redirect()->intended(route('yaps.index'));
    }

    public function edit()
    {
        return view('users.edit', ['user' => auth()->user()]);
    }

    public function update(UpdateUserRequest $request)
    {
        $attributes = $request->validated();
        /**
         * @var User $user;
         */
        $user = request()->user();

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $attributes['avatar'] = Storage::disk('public')->putFile('avatars', $request->file('avatar'));
        }

        $user->update($attributes);

        return redirect()->route('profile')->with('status', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::default()]
        ]);

        $user = auth()->user();
        $user->update([
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()->route('profile')->with('status', 'Password updated successfully!');
    }
}
