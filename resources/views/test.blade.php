@extends('layouts.app')

@section('title', $user->name . ' | Yappr')

@section('header')
    <x-header />
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- User Profile Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                <!-- Avatar -->
                <div class="flex-shrink-0">
                    @if ($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}"
                            class="w-32 h-32 rounded-full object-cover border-4 border-gray-200">
                    @else
                        <div
                            class="w-32 h-32 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 text-3xl font-bold border-4 border-gray-200">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <!-- User Info -->
                <div class="flex-grow text-center md:text-left">
                    <h1 class="text-3xl font-bold mb-2">{{ $user->name }}</h1>
                    <div class="text-gray-600 mb-4">Member since {{ $user->created_at->format('F Y') }}</div>

                    <!-- User Stats -->
                    <div class="flex flex-wrap justify-center md:justify-start gap-6 mt-3">
                        <div class="flex flex-col items-center">
                            <span class="text-xl font-bold">{{ $user->posts->count() }}</span>
                            <span class="text-gray-600 text-sm">Posts</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span class="text-xl font-bold">{{ $user->reactions->count() }}</span>
                            <span class="text-gray-600 text-sm">Reactions</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span class="text-xl font-bold">{{ $totalReactionsReceived }}</span>
                            <span class="text-gray-600 text-sm">Reactions Received</span>
                        </div>
                    </div>

                    <!-- Action Buttons (only show if current user is viewing their own profile) -->
                    @if (auth()->id() === $user->id)
                        <div class="mt-6">
                            <a href="{{ route('profile.edit') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-md text-gray-800 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Edit Profile
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- User Posts -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Posts by {{ $user->name }}</h2>

            @if ($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($posts as $post)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                            <!-- Post Thumbnail -->
                            @if ($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                    class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif

                            <!-- Post Content -->
                            <div class="p-4">
                                <!-- Visibility Badge -->
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm text-gray-600">{{ $post->created_at->format('M d, Y') }}</span>
                                    @if ($post->visibility !== 'public')
                                        <span class="px-2 py-1 bg-gray-200 text-gray-700 text-xs rounded-full">
                                            {{ ucfirst($post->visibility) }}
                                        </span>
                                    @endif
                                </div>

                                <h3 class="text-xl font-semibold mb-2">{{ $post->title }}</h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($post->content, 100) }}</p>

                                <!-- Post Footer -->
                                <div class="flex justify-between items-center pt-2 border-t border-gray-200">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-1"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ $post->reactions->count() }}</span>
                                    </div>
                                    <a href="{{ route('yaps.show', $post->slug) }}"
                                        class="text-blue-600 hover:text-blue-800 font-medium">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-xl text-gray-600">{{ $user->name }} hasn't posted anything yet.</p>

                    @if (auth()->id() === $user->id)
                        <a href="{{ route('yaps.create') }}"
                            class="inline-block mt-4 px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                            Create Your First Post
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection

@section('footer')
    <x-footer />
@endsection
