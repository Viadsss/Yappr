<x-layout :haveHeader="false" :haveFooter="false">
    <form action="{{ route('session.store') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" />
            @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
            @error('password')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Login</button>
    </form>
</x-layout>
