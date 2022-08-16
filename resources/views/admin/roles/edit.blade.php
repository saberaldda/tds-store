@extends('layouts.admin')

@section('title', __('Edit Role'))

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('Roles') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Edit') }}</li>
</ol>
@endsection

@section('content')

    <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        
        @include('admin.roles._form', [
            'button' => 'Update'
        ])
        
    </form>

@endsection