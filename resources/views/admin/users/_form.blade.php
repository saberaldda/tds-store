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
    <label for="">{{ __('Name') }}</label>
    <input placeholder="{{ __('Name') }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}">
    @error('name')
        <p class="invalid-feedback">{{ __($message) }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="">{{ __('Email') }}</label>
    <input placeholder="{{ __('Email') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
    @error('email')
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
    <label for="">{{ __('Password') }}</label>
    <input placeholder="{{ __('Password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
    @error('password')
        <p class="invalid-feedback">{{ __($message) }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="">{{ __('Confirm Password') }}</label>
    <input placeholder="{{ __('Confirm Password') }}" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
    @error('password_confirmation')
        <p class="invalid-feedback">{{ __($message) }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="Country">{{ __('Country') }}</label>
    <select name="country_id" id="country" class="form-control @error('country') is-invalid @enderror">
        <option value="">{{ __('Choose Country') }}</option>
        @foreach ($countries as $country)
            <option value="{{ $country->id }}" @if($country->id == old('country', $user->country_id)) selected @endif>
                {{ "($country->code)"  ." . . ".  __($country->name) }}
            </option>
        @endforeach
    </select>
    @error('country')
        <p class="invalid-feedback">{{ __($message) }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="status">{{ __('User Type') }}</label>
    <div>
        <div class="form-check @error('type') is-invalid @enderror">
            <input class="form-check-input" type="radio" name="type" id="super-admin" value="super-admin" @if(old('type', $user->type) == 'super-admin') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1"> {{ ucfirst(__('Super-Admin')) }} </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="admin" value="admin" @if(old('type', $user->type) == 'admin') checked @endif>
            <label class="form-check-label" for="flexRadioDefault2"> {{ ucfirst(__('Admin')) }} </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="user" value="user" @if(old('type', $user->type) == 'user') checked @endif>
            <label class="form-check-label" for="flexRadioDefault2"> {{ ucfirst(__('User')) }} </label>
        </div>
    </div>
    @error('type')
        <p class="text-danger">{{ __($message) }}</p>
    @enderror
</div>
{{-- 
<div class="form-group">
    <x-form-select name="category_id" label="Category" :options="$categories" :selected="$product->category_id" />
</div>

<div class="form-group">
    <label for="">{{ __('Description') }}</label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description"> {{ old('description', $product->description) }}</textarea>
    @error('description')
        <p class="invalid-feedback">{{ __($message) }}</p>
    @enderror
</div>

<div class="form-group">
    <x-form-input type="file" name="image" label="Image" :value="$product->image" />

</div>

<div class="form-group">
    <x-form-input type="text" name="sku" label="SKU" :value="$product->sku" />
</div>

<div class="form-group">
    <x-form-input type="number" name="price" label="Price" :value="$product->price" />
</div>

<div class="form-group">
    <x-form-input type="number" name="sale_price" label="Sale Price" :value="$product->sale_price" />
</div>

<div class="form-group">
    <x-form-input type="number" name="quantity" label="Quantity" :value="$product->quantity" />
</div>

<div class="form-group">
    <x-form-input type="number" name="weight" label="Weight" :value="$product->weight" />
</div>

<div class="form-group">
    <x-form-input type="number" name="width" label="Width" :value="$product->width" />
</div>

<div class="form-group">
    <x-form-input type="number" name="height" label="Height" :value="$product->height" />
</div>

<div class="form-group">
    <x-form-input type="number" name="length" label="Length" :value="$product->length" />
</div>
 --}}


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ __($button) }}</button>
</div>