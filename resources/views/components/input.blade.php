@props(['label', 'name', 'type' => 'text', 'value' => '', 'required' => false])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        class="form-control"
        value="{!! old($name, $value) !!}"
        {{ $required ? 'required' : '' }}>
</div>
