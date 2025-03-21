@extends('layouts.guest')
@section('title', 'Register | Yappr')

@section('header')
    <x-header />
@endsection

@section('content')
    <i class="ti ti-brand-laravel text-6xl text-indigo-600 md:text-7xl"></i>

    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white px-6 py-4 rounded-lg shadow-md w-full max-w-md">
        @csrf

        <x-forms.input.text label="Full Name" name="full_name" :required="true" autocomplete="name" />
        <x-forms.input.text label="Username" name="username" :required="true" />
        <x-forms.input.text label="Email" name="email" :required="true" type="email" autocomplete="email" />

        <x-forms.input.select name="gender" label="Gender" :required="true">
            <x-forms.option for="gender" value="male">Male</x-forms.option>
            <x-forms.option for="gender" value="female">Female</x-forms.option>
            <x-forms.option for="gender" value="others">Others</x-forms.option>
            <x-forms.option for="gender" value="unspecified">Prefer not to say</x-forms.option>
        </x-forms.input.select>

        <x-forms.input.text label="Password" name="password" :required="true" type="password" />
        <x-forms.input.text label="Confirm Password" name="password_confirmation" :required="true" type="password" />

        <x-forms.input.file name="avatar" label="Avatar" :required="true" hint="Upload PNG or JPG (2MB max)"
            accept="image/png, image/jpeg" />

        <div class="mt-3 flex items-center justify-center w-full">
            <img id="avatar-preview" src="#" alt="Avatar Preview"
                class="object-cover hidden w-64 h-64 rounded-full" />
        </div>

        <x-button variant="primary" type="submit" class="w-full mt-8">
            Register
        </x-button>

        <div class="text-center flex flex-col items-center mt-2">
            <span class="text-sm">Already have an account?</span>
            <x-link href="{{ route('login') }}" class="font-medium">Log in</x-link>
        </div>
    </form>

    @push('scripts')
        @vite('resources/js/imagePreview.js')
    @endpush
@endsection

@section('footer')
    <x-footer />
@endsection
