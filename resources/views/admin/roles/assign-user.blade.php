@extends('layouts.admin')

@section('title', __('Assign User To Role'))

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('Roles') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Assign User') }}</li>
</ol>
@endsection

@section('content')

    <h1>{{ __('Assign User To Role') }} <b class="text-primary">{{ ucfirst($role->name) }}</b></h1><hr/>
    <form action="{{ route('roles.save-assign', $role->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for=""><h4>{{ __('Users') }}</h4></label>
            @foreach ($users as $user)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="users[]" value="{{ $user->id }}" 
                    @foreach ($role_users as $role_user)
                        @if ($role_user->user_id == $user->id) checked @endif
                    @endforeach>
                <label class="form-check-label">
                {{$user->name}}
                </label>
            </div>
            @endforeach
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>

@endsection