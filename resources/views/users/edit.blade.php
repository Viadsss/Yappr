@extends('layouts.app')
@section('title', 'Edit Profile | Yappr')
@section('header')
    <x-header />
@endsection
@section('content')
    <div class="flex flex-col items-center justify-center gap-16 my-16">
        <!-- Profile Information Form -->
        <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data"
            class="bg-white px-6 py-4 rounded-lg shadow-md w-full max-w-md">

            <h2 class="text-xl font-bold mb-4 text-gray-800">Profile Information</h2>

            @csrf
            @method('PUT')

            <x-forms.input.text label="Name" name="name" :required="true" autocomplete="name" :value="auth()->user()->name" />

            <x-forms.input.text label="Email" name="email" :required="true" type="email" autocomplete="email"
                :value="auth()->user()->email" />

            <x-forms.input.select name="gender" label="Gender" :required="true">
                <x-forms.option for="gender" value="male" :selected="auth()->user()->gender == 'male'">Male</x-forms.option>
                <x-forms.option for="gender" value="female" :selected="auth()->user()->gender == 'female'">Female</x-forms.option>
                <x-forms.option for="gender" value="others" :selected="auth()->user()->gender == 'others'">Others</x-forms.option>
                <x-forms.option for="gender" value="unspecified" :selected="auth()->user()->gender == 'unspecified'">Prefer not to say</x-forms.option>
            </x-forms.input.select>

            <x-forms.input.file name="avatar" label="Avatar" :required="false" hint="Upload PNG or JPG (2MB max)"
                accept="image/png, image/jpeg" />

            <div class="mt-3 flex items-center justify-center w-full">
                <img id="avatar-preview"
                    src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : '#' }}"
                    alt="Avatar Preview"
                    class="{{ auth()->user()->avatar ? '' : 'hidden' }} object-cover w-64 h-64 rounded-full" />
            </div>

            <x-button variant="primary" type="submit" class="w-full mt-8">
                Update Profile
            </x-button>
        </form>

        <!-- Password Update Form -->
        <form action="{{ route('update-profile-password') }}" method="POST"
            class="bg-white px-6 py-4 rounded-lg shadow-md w-full max-w-md">

            <h2 class="text-xl font-bold mb-4 text-gray-800">Update Password</h2>

            @csrf
            @method('PUT')

            <x-forms.input.text label="Current Password" name="current_password" :required="true" type="password" />

            <x-forms.input.text label="New Password" name="password" :required="true" type="password" />

            <x-forms.input.text label="Confirm New Password" name="password_confirmation" :required="true"
                type="password" />

            <x-button variant="primary" type="submit" class="w-full mt-8">
                Update Password
            </x-button>
        </form>
    </div>

    @push('scripts')
        @vite('resources/js/imagePreview.js')
    @endpush
@endsection

@section('footer')
    <x-footer />
@endsection
