@php
    $computed = $attributes->whereStartsWith('wire:model')->first();
    $error = $errors->has($computed);
    $customize = tallstackui_personalization('form.radio', $personalization());
@endphp

<x-wrapper.radio :$computed :$error :$label :$position :$id>
    <input @if ($id) id="{{ $id }}" @endif type="radio" {{ $attributes->class([
            $customize['input'],
            $colors['input.color'],
            $customize['error'] => $error
    ]) }} @checked($checked)>
</x-wrapper.radio>
