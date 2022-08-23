@extends('layouts.admin')

@section('title')
    <div class="ml-5 justify-content-between">
        <h2 class="font-weight-bold">{{ __($title) }}</h2>
        <div>
            @can('create', App\Model\User::class)
            <a class="btn btn-sm btn-outline-primary font-weight-bold" href="{{ route('users.create') }}">{{ __('Create') }}</a>
            @endcan
            @can('restore', App\Model\User::class)
            <a class="btn btn-sm btn-outline-danger font-weight-bold" href="{{ route('users.trash') }}">{{ __('Trash') }}</a>
            @endcan
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item font-weight-bold"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item font-weight-bold">{{ __('Users') }}</li>
    </ol>
@endsection

{{-- Search Bar --}}
<x-search-bar email=1/>

@section('content')

    <table class="table table-bordered table-sm">
        <thead  style="position: sticky;top: 0">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Image') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('User Type') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Roles') }}</th>
                <th>{{ __('Country') }}</th>
                <th>{{ __('Ceated At') }}</th>
                <th style="width:134px">{{ __('Oprations') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td> <img src="{{ $user->image_url }}" alt="TheDarkSaber" width="80"></td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->type }} </td>
                    <td> {{ $user->email }} </td>
                    <td class="text-bold btn btn-sm btn-danger" onclick="location.href='{{ route('roles.index') }}';"> 
                        @foreach ($user->roles as $role) 
                        {{ "$role->name, " }} 
                        @endforeach 
                    </td>
                    <td> {{ $user->country->name }} </td>
                    <td> {{ $user->created_at }} </td>
                    <td class="d-flex justify-content-between ">
                        @can('view', $user)
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-success" title="{{ __('Show') }}"><i class="fas fa-eye"></i></a>
                        @endcan
                        @can('update', $user)
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary" title="{{ __('Edit') }}"><i class="fas fa-edit"></i></a>
                        @endcan

                        @can('delete', $user)
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <x-popup-window :process="'Delete'" :color="'danger'" :id="$loop->iteration" :icon="'fa-trash'"/>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->withQueryString()->links() }}
@endsection
