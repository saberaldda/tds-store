@extends('layouts.admin')

@section('title', __('Create A New User'))

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('Users') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Create') }}</li>
</ol>
@endsection

@section('content')

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @include('admin.users._form', [
        'button' => 'Add'
    ])

    </form>

@endsection