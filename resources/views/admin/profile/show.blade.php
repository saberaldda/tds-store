@extends('layouts.admin')

@section('title', __($title))

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">{{ __('Profile') }}</li>
    </ol>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Edit Profile') }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Profile photo') }}</label>
                        <div class="col-sm-7">
                                <div class="container text-center">
                                    <div class="col-md-4 px-0">
                                        <img src="{{ $user->image_url }}" class="img-fluid fileinput-new thumbnail img-circle">
                                    </div>
                                <div>
                                    <span class="btn btn-round btn-primary btn-file">
                                        <span class="fileinput">{{ __('Change Photo') }}</span>
                                        <input type="file" class="form-control" name="image">
                                    </span>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="name" value="{{ old('name', $user->name) }}"
                                    id="input-name" type="text" placeholder="{{ __('Name') }}" required="true"
                                    aria-required="true">
                                <div data-lastpass-icon-root="true"
                                    style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="email" value="{{ old('name', $user->email) }}"
                                    id="input-email" type="email" placeholder="{{ __('Email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Country') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select name="country_id" id="country"
                                    class="form-control @error('country') is-invalid @enderror">
                                    <option value="">{{ __('Choose Country') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            @if ($country->id == old('country', $user->country_id)) selected @endif>
                                            {{ "($country->code)" . ' . . ' . __($country->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Birth Date') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="birthdate" value="{{ old('birthdate', $user->profile->birthdate) }}"
                                    id="input-birthdate" type="date" placeholder="{{ __('Birth Date') }}" required="true"
                                    aria-required="true">
                                <div data-lastpass-icon-root="true"
                                    style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Address') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="address" value="{{ old('address', $user->profile->address) }}"
                                    id="input-address" type="text" placeholder="{{ __('Address') }}" required="true"
                                    aria-required="true">
                                <div data-lastpass-icon-root="true"
                                    style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Gender') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <div>
                                    <div class="form-check @error('gender') is-invalid @enderror">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" @if (old('gender', $user->profile->gender) == 'male') checked @endif>
                                        <label class="form-check-label" for="flexRadioDefault1"> {{ ucfirst(__('Male')) }} </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" @if (old('gender', $user->profile->gender) == 'female') checked @endif>
                                        <label class="form-check-label" for="flexRadioDefault2"> {{ ucfirst(__('Female')) }} </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">{{ __('Update Profile') }}</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('Change Password') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.change-pass', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <label class="col-sm-2 col-form-label"
                        for="input-current-password">{{ __('Current Password') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control @error('old_password') is-invalid @enderror" input="" type="password" name="old_password"
                                id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required="">
                            @error('old_password')
                                <p class="invalid-feedback">{{ __($message) }}</p>
                            @enderror
                            <div data-lastpass-icon-root="true"
                                style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control @error('password') is-invalid @enderror" name="password" id="input-password" type="password"
                                placeholder="{{ __('New Password') }}" value="" required="">
                                @error('password')
                                    <p class="invalid-feedback">{{ __($message) }}</p>
                                @enderror
                            <div data-lastpass-icon-root="true"
                                style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label"
                        for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="input-password-confirmation"
                                type="password" placeholder="{{ __('Confirm New Password') }}" value="" required="">
                                @error('password_confirmation')
                                    <p class="invalid-feedback">{{ __($message) }}</p>
                                @enderror
                            <div data-lastpass-icon-root="true"
                                style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">{{ __('Change Password') }}</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
    </div>

@endsection
