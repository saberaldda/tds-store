@extends('layouts.admin')

@section('title', __("Rating $type"))

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('ratings.index') }}">{{ __('Ratings') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Create') }}</li>
</ol>
@endsection

@section('content')

    <form action="{{ route('ratings.store', $type) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="">{{ __(ucfirst("$type".'s')) }}</label>
            <select name="id" id="id" class="form-control">
                <option value="">{{ __("Choose $type") }}</option>
                @foreach ($entries as $entry)
                    <option value="{{ $entry->id }}">{{ $entry->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">{{ __('Rating') }}</label>
            <select name="rating" id="rating" class="form-control">
                <option value="">{{ __("Choose Rate Value") }}</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __("Save") }}</button>
        </div>
    </form>

@endsection