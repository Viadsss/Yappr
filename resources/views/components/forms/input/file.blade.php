@props(['name', 'label', 'required' => false, 'disabled' => false, 'hint' => null])
{{-- px-2 py-1.5 --}}
<div class="mt-4">
    <x-forms.label :for="$name" :$label :required="$required" />

    <input type="file" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}"
        @disabled($disabled)
        {{ $attributes->merge([
            'class' => 'block w-full text-sm text-gray-900 mt-1 bg-transparent border border-gray-300 rounded-md pr-2 shadow-sm focus:outline focus:outline-2 focus:outline-indigo-500 disabled:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed file:py-2 file:px-4 file:mr-4 file:bg-indigo-500
                        file:text-white hover:file:bg-indigo-600 file:rounded-md file:font-semibold file:transition file:ease-in-out file:duration-150',
        ]) }}>

    @if ($hint)
        <p class="text-xs text-gray-500 mt-1">{{ $hint }}</p>
    @endif

    <x-forms.error :messages="$errors->get($name)" id="{{ $name }}-error" class="mt-2" />
</div>

@pushOnce('scripts')
    <script>
        document.addEventListener('input', (event) => {
            if (event.target.matches('input')) {
                const errorEl = document.getElementById(`${event.target.id}-error`);
                if (errorEl) {
                    errorEl.textContent = '';
                }
            }
        });
    </script>
@endpushOnce
