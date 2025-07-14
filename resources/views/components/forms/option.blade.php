@props(['value', 'for', 'data' => null])

<option value={{ $value }} @selected(old($for, $data) === $value) {{ $attributes }}"">
    {{ $slot }}
</option>
