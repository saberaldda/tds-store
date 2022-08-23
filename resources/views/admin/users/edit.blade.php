@extends('layouts.admin')

@section('title', __('Update User'))

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Update') }}</li>
</ol>
@endsection

@section('content')

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    
    @include('admin.users._form', [
        'button' => 'Update'
    ])

    </form>

@endsection