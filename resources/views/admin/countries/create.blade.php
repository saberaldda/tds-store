@extends('layouts.admin')

@section('title', __('Create A New Country'))

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('countries.index') }}">{{ __('Countries') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Create') }}</li>
    </ol>
@endsection

@section('content')

    <form action="{{ route('countries.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

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
            <label for="">{{ __('Country Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name', $country->name) }}">
            @error('name')
                <p class="invalid-feedback">{{ __($message) }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('Country Code') }}</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code"
                value="{{ old('code', $country->code) }}">
            @error('code')
                <p class="invalid-feedback">{{ __($message) }}</p>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
        </div>
    </form>

@endsection
