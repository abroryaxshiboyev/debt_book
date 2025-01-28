@props(['type' => 'submit', 'class' => 'btn-primary'])

<button type="{{ $type }}" class="btn {{ $class }}">
    {{ $slot }}
</button>
