@props(['value', 'for'])

<option value={{ $value }} @selected(old($for) === $value) {{ $attributes }}"">
    {{ $slot }}
</option>
