@extends('layouts.guest')
@section('title', 'Register | Yappr')

@section('header')
    <x-header />
@endsection

@section('content')
    <i class="ti ti-brand-laravel text-6xl text-indigo-600 md:text-7xl"></i>

    <form method="POST" action="{{ route('session.store') }} "
        class="bg-white px-6 py-4 rounded-lg shadow-md w-full max-w-md">
        @csrf

        <x-forms.input.text label="Username or Email" name="email" :required="true" autofocus />
        <x-forms.input.text label="Password" name="password" :required="true" type="password" />

        <div class="flex flex-col items-center my-4 justify-between sm:flex-row gap-2">
            <x-forms.input.checkbox label="Remember Me" name="remember_me" />
            <x-link href="/forgot-password">Forgot Password?</x-link>
        </div>
        <x-button variant="primary" type="submit" class="w-full mt-2">
            Log In
        </x-button>

        <div class="text-center flex flex-col items-center mt-2">
            <span class="text-sm">Don't have an account?</span>
            <x-link href="{{ route('register') }}" class="font-medium">Sign Up</x-link>
        </div>
    </form>
@endsection

@section('footer')
    <x-footer />
@endsection
