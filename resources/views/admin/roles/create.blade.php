@extends('layouts.admin')

@section('title', __('Create A New Role'))

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('Roles') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Create') }}</li>
</ol>
@endsection

@section('content')

    <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">

    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    {{-- {{ csrf_field() }} --}} <!--same action--> 
    @csrf <!--same action-->

        @include('admin.roles._form', [
            'button' => 'Add'
        ])
        
    </form>

@endsection