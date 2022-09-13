@if (isset($label))
    <label for="{{ $name }}">{{ __($label) }}</label>
@endif

    <select name="{{ $name }}" id="{{ $id ?? $name }}" class="form-control @error($name) is-invalid @enderror">
        <option value=""></option>
        @foreach ($options as $value => $text)
            <option value="{{ $value }}" @if($value == old($name, ($selected ?? null))) selected @endif>{{ $text }}</option>
        @endforeach
    </select>
    @error($name)
        <p class="invalid-feedback">{{ __($message) }}</p>
    @enderror