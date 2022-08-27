@extends('layouts.admin')

@section('title')
    <div class="ml-5 justify-content-between">
        <h2 class="font-weight-bold">{{ __($title) }}</h2>
        <div>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item font-weight-bold"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item font-weight-bold">{{ __('Ratings') }}</li>
    </ol>
@endsection

@section('content')

    <div>
        <a class="btn btn-sm btn-outline-primary font-weight-bold" href="{{ route('ratings.create', 'product') }}">{{ __('Rating Product') }}</a>
        <br>
        <a class="btn btn-sm btn-outline-primary font-weight-bold" href="{{ route('ratings.create', 'profile') }}">{{ __('Rating Profile') }}</a>
    </div>

@endsection
