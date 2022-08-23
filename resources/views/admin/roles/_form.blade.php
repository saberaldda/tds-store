@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $message)
                <li> {{ __($message) }} </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for=""><h4>{{ __('Role Name') }}</h4></label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $role->name) }}">
    @error('name')
        <p class="invalid-feedback">{{ __($message) }}</p>
    @enderror
</div>

<div class="d-flex justify-content-between">
    <div class="form-group">
        <label for=""><h4>{{ __('Abilities') }}</h4></label>
        @foreach (config('abilities') as $key => $value)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="abilities[]" value="{{ $key }}" @if(in_array($key, $role->abilities ?? [] )) checked @endif>
            <label class="form-check-label">
            {{__($value)}}
            </label>
        </div>
        @endforeach
    </div>
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ __($button) }}</button>
</div>