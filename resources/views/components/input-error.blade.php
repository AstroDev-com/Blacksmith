@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'text-danger small mt-2']) }}>
        @foreach ((array) $messages as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
@endif
