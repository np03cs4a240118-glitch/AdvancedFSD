@props([
'label',
'name',
'type' => 'text',
'value' => ''
])

<div class="form-group">

    <label for="{{ $name }}" class="form-label">
        {{ $label }}
    </label>

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        {{ $attributes->class(['form-control']) }}>

    @error($name)
    <div class="error">{{ $message }}</div>
    @enderror

</div>