@extends('layouts.app')

@section('title', $user->full_name . ' | Yappr')

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
                        <img src="{{ asset('storage/' . $user->avatar) ?? $user->avatar }}"
                            class="w-32 h-32 rounded-full object-cover border-4 border-gray-200">
                    @else
                        <div
                            class="w-32 h-32 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 text-3xl font-bold border-4 border-gray-200">
                            {{ strtoupper(substr($user->full_name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <!-- User Info -->
                <div class="flex-grow text-center md:text-left">
                    <h1 class="text-3xl font-bold mb-2">{{ $user->full_name }}</h1>
                    <p class="text-gray-500 mb-1">{{ '@' . $user->username }}</p>
                    <div class="text-gray-600 mb-4">Member since {{ $user->created_at->format('F Y') }}</div>

                    <!-- User Stats -->
                    <div class="flex flex-wrap justify-center md:justify-start gap-6 mt-3">
                        <div class="flex flex-col items-center">
                            <span class="text-xl font-bold">{{ $user->posts_count }}</span>
                            <span class="text-gray-600 text-sm">Posts</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span class="text-xl font-bold">{{ $user->totalReactions() }}</span>
                            <span class="text-gray-600 text-sm">Reactions</span>
                        </div>
                    </div>

                    <!-- Action Buttons (only show if current user is viewing their own profile) -->
                    @if (auth()->id() === $user->id)
                        <div class="mt-6">
                            <a href="{{ route('edit-profile') }}"
                                class="inline-flex items-center gap-x-1 px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-md text-gray-800 transition">
                                <i class="ti ti-pencil text-2xl"></i>
                                Edit Profile
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- User Posts -->
        <div class="mb-8">

            @if ($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($posts as $post)
                        <a href="{{ route('post.show', $post) }}"
                            class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
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
                                    <span class="px-2 py-1 bg-gray-200 text-gray-700 text-xs rounded-full">
                                        {{ ucfirst($post->visibility) }}
                                    </span>
                                </div>

                                <h3 class="text-xl font-semibold mb-2">{{ $post->title }}</h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($post->content, 100) }}</p>

                                <!-- Post Footer -->
                                <div class="flex justify-between items-center pt-2 border-t border-gray-200">
                                    <div class="flex items-center gap-1 text-gray-500">
                                        <i class="ti ti-heart-filled"></i>
                                        <span>{{ $post->reactions_count }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <i class="ti ti-text-plus text-6xl text-gray-600    "></i>
                    <p class="text-xl text-gray-600">{{ $user->full_name }} hasn't posted anything yet.</p>

                    @can('create', App\Models\Post::class)
                        <a href="#"
                            class="inline-block mt-4 px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                            Create Your First Post
                        </a>
                    @endcan
                </div>
            @endif
        </div>
    </div>
@endsection

@section('footer')
    <x-footer />
@endsection
