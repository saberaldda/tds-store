@extends('layouts.admin')

@section('content')

    <h2>User Profile</h2>
    @if (session('status') == 'profile-information-updated')
    <div class="alert alert-success">
        Your profile updated.
    </div>
    @endif

    <form action="{{ route('user-profile-information.update') }}" method="post">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="">{{ __('Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="">{{ __('Email') }}</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
            @error('email')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>
    <hr>

    <h2>Tow Factor Authentication</h2>
    @if (session('status') == 'two-factor-authentication-enabled')
        <div class="alert alert-success">
            Two factor authentication has been enabled.
        </div>
    @endif

    @isset($user->two_factor_secret)
        <h5>Recovery Codes</h5>
        <ul>
            @foreach ($user->recoveryCodes() as $code)
                <li>{{ $code }}</li>
            @endforeach
        </ul>
        {!! $user->twoFactorQrCodeSvg() !!}
    @endisset

    <form action="{{ route('two-factor.enable') }}" method="POST">
        @csrf
        <button class="btn btn-success" type="submit">Enable</button>
    </form>


    {{-- <h2>Tow Factor Authentication Confirmed</h2>
    @if (session('status') == 'two-factor-authentication-confirmed')
        <div class="alert alert-success">
            Two factor authentication has been confirmed.
        </div>
    @endif

    <form action="{{ route('two-factor.confirm') }}" method="POST">
        @csrf
        <div class="form-group">
        <input type="text" class="form-control" name="code" value="0000-00-00 00:00:00">
        </div>
        <button class="btn btn-success" type="submit">Confirm</button>
    </form> --}}

@endsection