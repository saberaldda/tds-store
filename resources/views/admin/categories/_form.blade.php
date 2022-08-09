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
    <label for="">{{ __('Category Name') }}</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $category->name) }}">
    {{-- @if ($errors->has('name'))
        <p class="text-danger">{{ $errors->get('name')[0] }}</p>
    @endif --}}
    @error('name')
        <p class="invalid-feedback">{{ __($message) }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="">{{ __('Parent') }}</label>
    <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
        <option value="">No Parent</option>
        @foreach ($parents as $parent)
            <option value="{{ $parent->id }}" @if($parent->id == old('parent_id', $category->parent_id)) selected @endif>{{ $parent->name }}</option>
        @endforeach
    </select>
    @error('parent_id')
        <p class="invalid-feedback">{{ __($message) }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="">{{ __('Description') }}</label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description"> {{ old('description', $category->description) }}</textarea>
    @error('description')
        <p class="invalid-feedback">{{ __($message) }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="">{{ __('Image') }}</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
    @error('image')
        <p class="invalid-feedback">{{ __($message) }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="status">{{ __('Status') }}</label>
    <div>
        <div class="form-check @error('status') is-invalid @enderror">
            <input class="form-check-input" type="radio" name="status" id="status-active" value="active" @if(old('status', $category->status) == 'active') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1"> {{ ucfirst(__('active')) }} </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status-archived" value="archived" @if(old('status', $category->status) == 'archived') checked @endif>
            <label class="form-check-label" for="flexRadioDefault2"> {{ ucfirst(__('archived')) }} </label>
        </div>
    </div>
    @error('status')
        <p class="text-danger">{{ __($message) }}</p>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{__($button)}}</button>
</div>