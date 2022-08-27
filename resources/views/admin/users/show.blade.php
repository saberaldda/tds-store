@extends('layouts.admin')

@section('title', __($title))

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
        <li class="breadcrumb-item active">{{ __('User Detail') }}</li>
    </ol>
@endsection

@section('content')

    <div class="d-flex justify-content-between ">
        <div class="form-group ">
            <label for="">{{ __('Image') }}</label>
            <br>
            <img class="fileinput-new thumbnail img-circle" src="{{ $user->image_url }}" alt="TheDarkSaber" width="200">
        </div>
    </div>
    <div class="d-flex justify-content-between ">
        <div class="form-group">
            <label for="">{{ __('Roles') }}</label>
            <input type="text" class="form-control" 
            value="@foreach ($user->roles as $role)({{ $role->name }}) @endforeach" size="40" readonly>
        </div>
        <div class="form-group">
            <label for="">{{ __('Name') }}</label>
            <input type="text" class="form-control" value="{{ $user->name }}" size="40" readonly>
        </div>
        <div class="form-group">
            <label for="">{{ __('Email') }}</label>
            <input type="text" class="form-control" value="{{ $user->email }}" size="40" readonly>
        </div>
    </div>
    <div class="d-flex justify-content-between ">
        <div class="form-group">
            <label for="">{{ __('Rating Average') }}</label>
            <input type="text" class="form-control" value="{{ $rating_average }}" size="40" readonly>
        </div>
        <div class="form-group">
            <label for="">{{ __('User Type') }}</label>
            <input type="text" class="form-control" value="{{ $user->type }}" size="40" readonly>
        </div>
        <div class="form-group">
            <label for="">{{ __('Gender') }}</label>
            <input type="text" class="form-control" value="{{ $user->profile->gender }}" size="40" readonly>
        </div>
    </div>
    <div class="d-flex justify-content-between ">
        <div class="form-group">
            <label for="">{{ __('Birth Date') }}</label>
            <input type="text" class="form-control" value="{{ $user->profile->birthdate }}" size="40" readonly>
        </div>
        <div class="form-group">
            <label for="">{{ __('Country') }}</label>
            <input type="text" class="form-control" value="{{ $user->country->name }}" size="40" readonly>
        </div>
        <div class="form-group">
            <label for="">{{ __('Address') }}</label>
            <input type="text" class="form-control" value="{{ $user->profile->address }}" size="40" readonly>
        </div>
    </div>
@endsection
