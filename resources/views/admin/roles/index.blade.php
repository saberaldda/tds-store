@extends('layouts.admin')

@section('title')
<div class="d-flex justify-content-between">
    <h2>Roles</h2>
    <div class="">
        {{-- @can('roles.create') --}}
        <a class="btn btn-sm btn-outline-primary" href="{{ route('roles.create') }}">Create</a>
        {{-- @endcan --}}
    </div>
</div>
@endsection

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Roles</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('content')

    {{-- @if ($success)
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif --}}

    <x-alert />

    {{-- <x-message type="info" message-text="Welcome to Laravel method 1" /> --}}

    {{-- <x-message type="info" :count="1 + 1">
        <p> Welcome to Laravel method 2 </p>
    </x-message> --}}
    
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Ceated At</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td> {{ $role->name }} </td>
            <td> {{ $role->created_at }} </td>
            <td> 
                {{-- @can('roles.update') --}}
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-dark">Edit</a> 
                {{-- @endcan --}}
            </td>
            <td>
                {{-- @if (Auth::user()->can('roles.delete')) --}}
                <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
                {{-- @endif --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    {{ $roles->withQueryString()->links() }}

@endsection