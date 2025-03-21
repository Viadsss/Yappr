@props(['name', 'label', 'required' => false, 'disabled' => false, 'hint' => null, 'value' => null, 'rows' => 3])
<div class="mt-4">
    <x-forms.label :for="$name" :$label :required="$required" />
    <textarea id="{{ $name }}" name="{{ $name }}" @disabled($disabled) rows="{{ $rows }}"
        {{ $attributes->merge([
            'class' =>
                'block w-full text-gray-900 mt-1 bg-transparent border border-gray-300 rounded-md shadow-sm px-2 py-1.5 focus:outline focus:outline-2 focus:outline-indigo-500 disabled:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed',
        ]) }}>{{ old($name, $value) }}</textarea>
    @if ($hint)
        <p class="text-xs text-gray-500 mt-1">{{ $hint }}</p>
    @endif
    <x-forms.error :messages="$errors->get($name)" id="{{ $name }}-error" class="mt-2" />
</div>
@pushOnce('scripts')
    <script>
        document.addEventListener('input', (event) => {
            if (event.target.matches('textarea')) {
                const errorEl = document.getElementById(`${event.target.id}-error`);
                if (errorEl) {
                    errorEl.textContent = '';
                }
            }
        });
    </script>
@endpushOnce
