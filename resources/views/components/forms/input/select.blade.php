@props(['name', 'label', 'required' => false])

<div class="mt-4">
    <x-forms.label :for="$name" :$label :required="$required" />

    <select id="{{ $name }}" name="{{ $name }}"
        {{ $attributes->merge([
            'class' =>
                'block w-full text-gray-900 mt-1 bg-white border border-gray-300 rounded-md shadow-sm px-2 py-1.5 focus:outline focus:outline-2 focus:outline-indigo-500 disabled:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed',
        ]) }}>
        <option selected disabled>--Choose an option--</option>

        {{ $slot }}
    </select>

    <x-forms.error :messages="$errors->get($name)" id="{{ $name }}-error" class="mt-2" />
</div>

@pushOnce('scripts')
    <script>
        document.addEventListener('change', (event) => {
            if (event.target.matches('select')) {
                const errorEl = document.getElementById(`${event.target.id}-error`);
                if (errorEl) {
                    errorEl.textContent = '';
                }
            }
        });
    </script>
@endpushOnce
