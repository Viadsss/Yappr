<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Str;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Determine if the input is an email or username
        $loginField = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Set the credentials based on the input type
        $credentials = [
            $loginField => $loginField === 'email'
                ? Str::lower($request->input('email'))
                : $request->input('email'),
            'password' => $request->input('password')
        ];

        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials, $request->has('remember_me'))) {
            throw ValidationException::withMessages([
                'password' => 'Credentials do not match our records'
            ]);
        }

        request()->session()->regenerate();

        return redirect()->intended(route('yaps.index'));
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
