@extends('layouts.app')

@section('header')
    <x-header />
@endsection


@section('content')
    <div class="container mx-auto px-4 py-8">

        <div class="max-w-2xl mx-auto">
            @session('status')
                <x-alert type="{{ session('status_type') }}" class="my-4">
                    {{ session('status') }}
                </x-alert>
            @endsession
        </div>
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Post Header -->
            <div class="p-4 flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset($post->user->avatar) }}" alt="{{ $post->user->username }}"
                        class="h-10 w-10 rounded-full">
                    <div>
                        <h3 class="font-semibold text-lg">{{ $post->user->username }}</h3>
                        <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                @can('update', $post)
                    <x-dropdown align="right" width="32">
                        <x-slot:trigger>
                            <i class="ti ti-dots-vertical"></i>
                        </x-slot:trigger>

                        <x-slot:content>
                            <x-dropdown-link href="{{ route('post.edit', $post) }}">
                                <i class="ti ti-edit"></i>
                                <span class="text-sm">Edit</span>
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('post.destroy', $post) }}">
                                @csrf
                                @method('DELETE')

                                <x-dropdown-link :destructive="true" :href="route('post.destroy', $post)"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <i class="ti ti-trash-x"></i>
                                    <span class="text-sm">Delete</span>
                                </x-dropdown-link>
                            </form>
                        </x-slot:content>
                    </x-dropdown>
                @endcan
            </div>

            <!-- Post Content -->
            <div class="p-4">
                <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
                <div class="prose max-w-none text-gray-800">
                    {{ $post->content }}
                </div>
                <img src="{{ asset($post->thumbnail) }}" alt="Post Image" class="mt-4 w-full h-auto rounded-lg">
            </div>

            <!-- Reactions Section -->
            <div class="flex items-center space-x-4 text-gray-500 p-4">
                <button id="reactBtn"
                    class="flex items-center space-x-1 cursor-pointer transition hover:text-gray-700 group"
                    data-reacted="{{ $reacted ? 'true' : 'false' }}">
                    <i class="ti ti-heart-filled transition-all group-hover:scale-110"></i>
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
    </div>
@endsection

@section('footer')
    <x-footer />
@endsection

@pushOnce('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const reactBtn = document.getElementById("reactBtn");
            const reactCount = reactBtn.querySelector("span");
            const heartIcon = reactBtn.querySelector("i");
            const postId = {{ $post->id }}; // Get post ID once

            // Initialize the button state
            function updateButtonState(isReacted) {
                if (isReacted) {
                    reactBtn.classList.add("text-red-500");
                    heartIcon.classList.add("scale-125");
                    reactBtn.classList.add("hover:text-red-600");
                } else {
                    reactBtn.classList.remove("text-red-500", "hover:text-red-600");
                    heartIcon.classList.remove("scale-125");
                }
                reactBtn.setAttribute("data-reacted", isReacted ? "true" : "false");
            }

            // Set initial state
            updateButtonState(reactBtn.getAttribute("data-reacted") === "true");

            reactBtn.addEventListener("click", async () => {
                try {
                    const response = await fetch("{{ route('reactions.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            post_id: postId
                        })
                    });

                    const data = await response.json();

                    if (!response.ok) throw new Error(data.message || "An error occurred");

                    reactCount.textContent = data.reactions_count;

                    updateButtonState(data.is_reacted);

                } catch (error) {
                    console.error("Error:", error);
                }
            });
        });
    </script>
@endPushOnce
