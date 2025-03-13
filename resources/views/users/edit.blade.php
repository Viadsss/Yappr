<x-layout>
    <div>
        <form action="{{ route('update-profile', ['user' => $user]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" />
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" />
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="" disabled>Select your gender</option>
                    <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female
                    </option>
                    <option value="others" {{ old('gender', $user->gender) == 'others' ? 'selected' : '' }}>Others
                    </option>
                    <option value="unspecified" {{ old('gender', $user->gender) == 'unspecified' ? 'selected' : '' }}>
                        Prefer not to say</option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="avatar">Avatar (jpg, jpeg, png, max 2MB)</label>
                <input type="file" id="avatar" name="avatar" accept=".jpg,.jpeg,.png" />
                @error('avatar')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <!-- Avatar Preview -->
                <div class="mt-3">
                    <img id="avatar-preview" src="{{ $user->avatar ? asset('storage/' . $user->avatar) : '#' }}"
                        alt="Avatar Preview" class="{{ $user->avatar ? 'max-w-32 rounded-lg' : 'hidden' }}" />
                </div>
            </div>

            <div>
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" />
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" />
            </div>

            <button type="submit">Update</button>
        </form>
    </div>

    @push('scripts')
        @vite('resources/js/imagePreview.js')
    @endpush
</x-layout>
