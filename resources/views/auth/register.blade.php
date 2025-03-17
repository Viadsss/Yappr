@extends('layouts.guest')
@section('title', 'Log In | Yappr')
@section('content')
    <i class="ti ti-brand-laravel text-7xl text-indigo-600"></i>

    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white px-6 py-4 rounded-lg shadow-md w-md">
        @csrf

        <x-forms.input.text label="Name" name="name" :required="true" autofocus autocomplete="name" />
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
            <img id="avatar-preview" src="#" alt="Avatar Preview" class="hidden w-64 h-64 rounded-full" />
        </div>

        <x-button variant="primary" type="submit" class="w-full mt-8">
            Register
        </x-button>

        <div class="text-center flex flex-col items-center mt-2">
            <span class="text-sm">Already have an account?</span>
            <x-link href="{{ route('login') }}" class="font-medium">Log in</x-link>
        </div>

        @push('scripts')
            @vite('resources/js/imagePreview.js')
        @endpush
    @endsection

    {{-- <x-layout title="Register | Yappr" :haveHeader="false" :haveFooter="false">
    <div>
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Name</label>
                <x-forms.label for="name" :required="false">Name</x-forms.label>
                <x-forms.input type="text" name="name" id="name" value="{{ old('name') }}" />
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="others" {{ old('gender') == 'others' ? 'selected' : '' }}>Others</option>
                    <option value="unspecified" {{ old('gender') == 'unspecified' ? 'selected' : '' }}>Prefer not to say
                    </option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="avatar">Avatar (jpg, jpeg, png, max 2MB)</label>
                <input type="file" id="avatar" name="avatar" accept=".jpg,.jpeg,.png" />
                @error('avatar')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <div class="mt-3">
                    <img id="avatar-preview" src="#" alt="Avatar Preview" class="hidden max-w-32 rounded-lg" />
                </div>

                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" />
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" />
                </div>


                <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Register</button>
            </div>


        </form>
    </div>

    @push('scripts')
        @vite('resources/js/imagePreview.js')
    @endpush
</x-layout> --}}
