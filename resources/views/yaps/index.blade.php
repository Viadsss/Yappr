<x-layout>
    <div>
        {{-- <img src="{{ Storage::url(auth()->user()->avatar) }}" /> --}}
        <form action="{{ route('session.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Logout</button>
        </form>

        <h1>Helloo from Index Yaps</h1>
        @foreach ($posts as $post)
            <div class="px-4 py-2">
                <img src="{{ $post->thumbnail_url }}" />
                <h3>{{ $post->title }}</h3>
                <h4>{{ $post->user->name }}</h4>
            </div>
        @endforeach
    </div>
</x-layout>
