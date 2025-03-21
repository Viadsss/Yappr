@extends('layouts.app')
@section('title', 'Explore Yaps | Yappr')

@section('header')
    <x-header />
@endsection

@section('content')
    <div class="w-full max-w-5xl mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold">Explore Yaps</h2>
            <a href="{{ route('yaps.create') }}"
                class="hidden sm:inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-sm">
                <i class="ti ti-plus mr-2"></i> Create Yap
            </a>
        </div>


        <div class="fixed bottom-6 right-6 md:hidden z-10">
            <a href="{{ route('yaps.create') }}"
                class="flex items-center justify-center w-14 h-14 bg-indigo-600 text-white rounded-full shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <i class="ti ti-plus text-xl"></i>
            </a>
        </div>

        <div class="space-y-4">
            @foreach ($posts as $post)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center overflow-hidden">
                            @if ($post->user->avatar)
                                <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}"
                                    class="w-full h-full object-cover">
                            @else
                                <i class="ti ti-user text-indigo-600"></i>
                            @endif
                        </div>
                        <div>
                            <p class="font-medium">{{ $post->user->name }}</p>
                            <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <h4 class="font-medium mb-2">{{ $post->title }}</h4>
                    <p class="text-gray-700 mb-3">{{ Str::limit(strip_tags($post->content), 100) }}</p>

                    @if ($post->thumbnail_url)
                        <div class="p-3 mb-3">
                            <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}" class="rounded object-cover" />
                        </div>
                    @endif

                    <div class="flex items-center space-x-4 mt-3 text-gray-500">
                        <a href="" class="flex items-center space-x-1">
                            <i class="ti ti-heart"></i>
                            <span>3</span>
                        </a>
                        <a href="" class="flex items-center space-x-1">
                            <i class="ti ti-message-circle"></i>
                            <span>0</span>
                        </a>
                        <a href="" class="flex items-center space-x-1">
                            <i class="ti ti-share"></i>
                            <span>0</span>
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
