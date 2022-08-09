@if (isset($label))
    <label for="{{ $id ?? $name }}">{{ __($label) }}</label>
@endif

<input type="{{ $type ?? 'text' }}" 
        class="form-control @error($name) is-invalid @enderror" 
        placeholder="{{ @$placeholder }}"
        name="{{ $name }}" 
        id="{{ $id ?? $name }}"
        value="{{ old($name, $value ?? null) }}">

@error($name)
    <p class="invalid-feedback">{{ __($message) }}</p>
@enderror