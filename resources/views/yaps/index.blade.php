{{-- <x-layout>
    <div>
        <h1>Helloo from Index Yaps</h1>
        @foreach ($posts as $post)
            <div class="px-4 py-2">
                <img src="{{ $post->thumbnail_url }}" />
                <h3>{{ $post->title }}</h3>
                <h4>{{ $post->user->name }}</h4>
            </div>
        @endforeach
    </div>
</x-layout> --}}

@extends('layouts.app')
@section('title', 'Yaps | Yappr')

@section('header')
    <x-header />
@endsection

@section('content')
    <div>
        <h1>Helloo from Index Yaps</h1>
        @foreach ($posts as $post)
            <div class="px-4 py-2">
                {{-- <img src="{{ $post->thumbnail_url }}" /> --}}
                {{-- <h3>{{ $post->title }}</h3> --}}
                <h4>{{ $post->user->name }}</h4>
            </div>
        @endforeach
    </div>
@endsection

@section('footer')
    <x-footer />
@endsection
