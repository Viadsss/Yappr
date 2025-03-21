@extends('layouts.app')
@section('title', 'Create Post | Yappr')
@section('header')
    <x-header />
@endsection
@section('content')
    <div class="container mx-auto px-4 py-8 flex flex-col items-center">
        <h1 class="text-3xl font-bold text-center mb-8">Create New Post</h1>

        <form action="#" method="POST" enctype="multipart/form-data"
            class="bg-white px-6 py-4 rounded-lg shadow-md w-full max-w-md">
            @csrf
            <x-forms.input.text label="Title" name="title" :required="true" />

            <x-forms.input.textarea name="content" label="Content" :required="true" rows="6"
                placeholder="Share your thoughts..." />

            <x-forms.input.select name="visibility" label="Visibility" :required="true">
                <x-forms.option for="visibility" value="public">Public</x-forms.option>
                <x-forms.option for="visibility" value="private">Private</x-forms.option>
                <x-forms.option for="visibility" value="followers">Followers Only</x-forms.option>
            </x-forms.input.select>

            <x-forms.input.file name="thumbnail" label="Thumbnail Image" :required="false"
                hint="Upload PNG or JPG (2MB max)" accept="image/png, image/jpeg" />

            <div class="mt-3 flex items-center justify-center w-full">
                <img id="thumbnail-preview" src="#" alt="Thumbnail Preview"
                    class="object-cover hidden w-full h-64 rounded-lg" />
            </div>

            <x-forms.input.datetime name="scheduled_at" label="Schedule Post (Optional)" :required="false"
                hint="Leave empty to publish immediately" min="{{ now()->format('Y-m-d\TH:i') }}" />

            {{-- <x-forms.input.datetime name="scheduled_at" label="Schedule Post (Optional)" :required="false"
                hint="Leave empty to publish immediately" /> --}}

            <div class="flex gap-4 mt-8">
                <x-button variant="secondary" type="button" class="w-1/2" onclick="window.history.back()">
                    Cancel
                </x-button>
                <x-button variant="primary" type="submit" class="w-1/2">
                    Create Post
                </x-button>
            </div>
        </form>
    </div>

    @push('scripts')
        @vite('resources/js/imagePreview.js')
    @endpush
@endsection
@section('footer')
    <x-footer />
@endsection
