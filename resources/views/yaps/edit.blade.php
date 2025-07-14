@extends('layouts.app')

@section('title', 'Edit Post | Yappr')

@section('header')
    <x-header />
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8 flex flex-col items-center">
        <h1 class="text-3xl font-bold text-center mb-8">Edit Post</h1>

        <form action="{{ route('post.update', $post->slug) }}" method="POST" enctype="multipart/form-data"
            class="bg-white px-6 py-4 rounded-lg shadow-md w-full max-w-md">
            @csrf
            @method('PUT')

            <x-forms.input.text label="Title" name="title" :required="true" value="{{ $post->title }}" />

            <x-forms.input.textarea name="content" label="Content" :required="true" rows="6" :value="$post->content"
                placeholder="Share your thoughts..." />

            <x-forms.input.select name="visibility" label="Visibility" :required="true">
                <x-forms.option for="visibility" value="public" :data="$post->visibility">
                    Public
                </x-forms.option>
                <x-forms.option for="visibility" value="private" :data="$post->visibility">
                    Private
                </x-forms.option>
                <x-forms.option for="visibility" value="followers" :data="$post->visibility">
                    Followers Only
                </x-forms.option>
            </x-forms.input.select>

            {{-- Current thumbnail display --}}
            @if ($post->thumbnail)
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Thumbnail</label>
                    <div class="relative">
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Current thumbnail"
                            class="w-full h-32 object-cover rounded-lg">
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="remove_thumbnail" value="1"
                                    class="form-checkbox h-4 w-4 text-red-600">
                                <span class="ml-2 text-sm text-red-600">Remove current thumbnail</span>
                            </label>
                        </div>
                    </div>
                </div>
            @endif

            <x-forms.input.file name="thumbnail"
                label="{{ $post->thumbnail ? 'Replace Thumbnail Image' : 'Thumbnail Image' }}" :required="false"
                hint="Upload PNG or JPG (5MB max)" accept="image/png, image/jpeg" />

            <div class="mt-3 flex items-center justify-center w-full">
                <img id="thumbnail-preview" src="#" alt="Thumbnail Preview"
                    class="object-cover hidden w-full h-64 rounded-lg" />
            </div>

            <x-forms.input.datetime name="scheduled_at" label="Schedule Post (Optional)" :required="false"
                hint="Leave empty to publish immediately" min="{{ now()->format('Y-m-d\TH:i') }}"
                value="{{ old('scheduled_at', $post->scheduled_at?->format('Y-m-d\TH:i')) }}" />

            <div class="flex gap-4 mt-8">
                <x-button variant="secondary" type="button" class="w-1/2" onclick="window.history.back()">
                    Cancel
                </x-button>
                <x-button variant="primary" type="submit" class="w-1/2">
                    Update Post
                </x-button>
            </div>
        </form>

        {{-- Delete Post Section --}}
        <div class="mt-8 bg-red-50 p-4 rounded-lg shadow-md w-full max-w-md border border-red-200">
            <h3 class="text-lg font-semibold text-red-800 mb-2">Danger Zone</h3>
            <p class="text-sm text-red-600 mb-4">
                Deleting this post is permanent and cannot be undone.
            </p>
            <form action="{{ route('post.destroy', $post) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <x-button variant="danger" type="submit" class="w-full">
                    Delete Post
                </x-button>
            </form>
        </div>
    </div>

    @push('scripts')
        @vite('resources/js/imagePreview.js')
    @endpush
@endsection

@section('footer')
    <x-footer />
@endsection
