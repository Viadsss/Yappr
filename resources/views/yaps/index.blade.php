@extends('layouts.app')
@section('title', 'Explore Yaps | Yappr')

@section('header')
    <x-header />
@endsection

@section('content')
    <div class="w-full max-w-5xl mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold">Explore Yaps</h2>

            @can('create', App\Models\Post::class)
                <a href="{{ route('yaps.create') }}"
                    class="hidden sm:inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-sm">
                    <i class="ti ti-plus mr-2"></i> Create Yap
                </a>
            @endcan
        </div>


        @can('create', App\Models\Post::class)
            <div class="fixed bottom-6 right-6 md:hidden z-10">
                <a href="{{ route('yaps.create') }}"
                    class="flex items-center justify-center w-14 h-14 bg-indigo-600 text-white rounded-full shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="ti ti-plus text-xl"></i>
                </a>
            </div>
        @endcan

        @session('status')
            <x-alert type="{{ session('status_type') }}" class="my-4">
                {{ session('status') }}
            </x-alert>
        @endsession


        <div class="space-y-4">
            @foreach ($posts as $post)
                <div id="post-{{ $post->slug }}" data-route="{{ route('post.show', $post->slug) }}"
                    class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center overflow-hidden">
                            @if ($post->user->avatar)
                                <img src="{{ asset($post->user->avatar) }}" alt="{{ $post->user->username }}"
                                    class="w-full h-full object-cover">
                            @else
                                <i class="ti ti-user text-indigo-600"></i>
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('profile', $post->user) }}"
                                class="font-medium">{{ $post->user->full_name }}</a>
                            <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                        </div>

                        <div class="ml-auto">
                            @can('update', $post)
                                <x-dropdown align="right" width="32">
                                    <x-slot:trigger>
                                        <i class="ti ti-dots-vertical"></i>
                                    </x-slot:trigger>

                                    <x-slot:content>
                                        <x-dropdown-link onclick="event.stopPropagation()"
                                            href="{{ route('post.edit', $post) }}">
                                            <i class="ti ti-edit"></i>
                                            <span class="text-sm">Edit</span>
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('post.destroy', $post) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="redirect_to" value="{{ url()->current() }}">
                                            <x-dropdown-link :destructive="true" :href="route('post.destroy', $post)"
                                                onclick="event.preventDefault();
                                                event.stopPropagation();
                                                this.closest('form').submit();">
                                                <i class="ti ti-trash-x"></i>
                                                <span class="text-sm">Delete</span>
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot:content>
                                </x-dropdown>
                            @endcan
                        </div>
                    </div>

                    <h4 class="font-medium mb-2">{{ $post->title }}</h4>
                    <p class="text-gray-700 mb-3">{{ Str::limit(strip_tags($post->content), 100) }}</p>

                    @if ($post->thumbnail)
                        <div class="p-3 mb-3">
                            <img src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}"
                                class="rounded w-full max-h-96 object-cover" />
                        </div>
                    @endif

                    <div class="flex items-center space-x-4 mt-3 text-gray-500">
                        <button id="reactBtn"
                            class="flex items-center space-x-1 cursor-pointer {{ $post->hasReactionFrom(auth()->user()) ? 'text-red-500' : '' }}">
                            <i class="ti ti-heart-filled"></i>
                            <span>{{ \Number::abbreviate($post->reactions_count) }}</span>
                        </button>
                        <a href="" class="flex items-center space-x-1">
                            <i class="ti ti-message-circle-filled"></i>
                            <span>{{ \Number::abbreviate(0) }}</span>
                        </a>
                        <a href="" class="flex items-center space-x-1">
                            <i class="ti ti-share"></i>
                            <span>{{ \Number::abbreviate(0) }}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>

        @if ($posts->isEmpty())
            <div class="text-center py-8">
                <div class="text-gray-400 mb-4">
                    <i class="ti ti-mood-empty text-5xl"></i>
                </div>
                <h3 class="text-xl font-medium mb-2">No posts found</h3>
                <p class="text-gray-500">Looks like there are no posts available at the moment.</p>
            </div>
        @endif
    </div>
@endsection

@section('footer')
    <x-footer />
@endsection

@pushOnce('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll("[data-route]").forEach(post => {
                post.addEventListener("click", (event) => {
                    if (event.target.closest("button")) {
                        return;
                    }

                    window.location.href = post.getAttribute("data-route");
                });
            });
        });
    </script>
@endPushOnce
