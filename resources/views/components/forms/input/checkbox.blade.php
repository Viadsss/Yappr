@props(['name', 'label', 'required' => false, 'disabled' => false])

<div>
    <input id="{{ $name }}" name="{{ $name }}" type="checkbox" @checked(old($name))
        @disabled($disabled)
        {{ $attributes->merge([
            'class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 accent-indigo-600',
        ]) }}>

    <x-forms.label :for="$name" :$label :required="$required" class="inline-block" />

    <x-forms.error :messages="$errors->get($name)" class="mt-2" />
</div>

@pushOnce('scripts')
    <script>
        document.addEventListener('change', (event) => {
            if (event.target.matches('input[type="checkbox"]')) {
                const errorEl = document.getElementById(`${event.target.id}-error`);
                if (errorEl) {
                    errorEl.textContent = '';
                }
            }
        });
    </script>
@endpushOnce
