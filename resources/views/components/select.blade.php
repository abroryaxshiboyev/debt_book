@props(['label', 'name', 'options', 'selected' => null])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control">
        <option value="">Select a {{ strtolower($label) }}</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}"
                {{ (string) $option->id === (string) $selected ? 'selected' : '' }}>
                {{ $option->name }}
            </option>
        @endforeach
    </select>
</div>
