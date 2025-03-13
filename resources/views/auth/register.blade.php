<x-layout :haveHeader="false" :haveFooter="false">
    <div>
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" />
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="others" {{ old('gender') == 'others' ? 'selected' : '' }}>Others</option>
                    <option value="unspecified" {{ old('gender') == 'unspecified' ? 'selected' : '' }}>Prefer not to say
                    </option>
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
                    <img id="avatar-preview" src="#" alt="Avatar Preview" class="hidden max-w-32 rounded-lg" />
                </div>

                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" />
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" />
                </div>


                <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Register</button>
            </div>


        </form>
    </div>

    @push('scripts')
        @vite('resources/js/imagePreview.js')
    @endpush
</x-layout>
