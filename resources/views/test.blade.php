<!-- filepath: c:\Users\John Paul\Herd\yappr\resources\views\test.blade.php -->
@extends('layouts.guest')
@section('title', 'Log In | Yappr')

@section('header')
    <x-header />
@endsection

@section('content')

    <div class="space-y-4">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center space-x-3 mb-3">
                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                    <i class="ti ti-user text-indigo-600"></i>
                </div>
                <div>
                    <p class="font-medium">Alex Morgan</p>
                    <p class="text-xs text-gray-500">2 hours ago</p>
                </div>
            </div>
            <div class="bg-gray-50 rounded-lg p-3 flex items-center justify-between">
                <div class="flex items-center">
                    <i id="play-icon" class="ti ti-player-play text-indigo-600 mr-3 cursor-pointer"></i>
                    <span class="text-sm">Thoughts on the latest tech trends</span>
                </div>
                <span id="audio-duration" class="text-xs text-gray-500">0:42</span>
            </div>

            {{-- Reactions --}}
            <div class="flex items-center space-x-4 mt-3 text-gray-500">
                <button class="flex items-center space-x-1">
                    <i class="ti ti-heart"></i>
                    <span>124</span>
                </button>
                <button class="flex items-center space-x-1">
                    <i class="ti ti-message-circle"></i>
                    <span>18</span>
                </button>
                <button class="flex items-center space-x-1">
                    <i class="ti ti-share"></i>
                    <span>8</span>
                </button>
            </div>
        </div>
    </div>

    <audio id="custom-audio" class="hidden">
        <source src="{{ Vite::asset('resources/audio/audio_test.mp3') }}" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>

@endsection

@section('footer')
    <x-footer />
@endsection

@pushOnce('scripts')
    <script>
        const audio = document.getElementById('custom-audio');
        const playIcon = document.getElementById('play-icon');
        const audioDuration = document.getElementById('audio-duration');

        playIcon.addEventListener('click', () => {
            if (audio.paused) {
                audio.play();
                playIcon.classList.remove('ti-player-play');
                playIcon.classList.add('ti-player-pause');
            } else {
                audio.pause();
                playIcon.classList.remove('ti-player-pause');
                playIcon.classList.add('ti-player-play');
            }
        });

        audio.addEventListener('timeupdate', () => {
            const minutes = Math.floor(audio.currentTime / 60);
            const seconds = Math.floor(audio.currentTime % 60).toString().padStart(2, '0');
            audioDuration.textContent = `${minutes}:${seconds}`;
        });

        audio.addEventListener('loadedmetadata', () => {
            const minutes = Math.floor(audio.duration / 60);
            const seconds = Math.floor(audio.duration % 60).toString().padStart(2, '0');
            audioDuration.textContent = `${minutes}:${seconds}`;
        });
    </script>
@endpushOnce
