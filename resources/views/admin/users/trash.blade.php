@extends('layouts.admin')

@section('title')
    <div class="d-flex justify-content-between">
        <h2>{{ __('Trashed Users') }}</h2>
        <div class="">
            @can('viewAny', App\Model\User::class)
            <a class="btn btn-sm btn-outline-primary" href="{{ route('users.index') }}">{{ __('Users') }}</a>
            @endcan
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Trash') }}</li>
    </ol>
@endsection

{{-- Search Bar --}}
<x-search-bar email=1/>

@section('content')

    <div class="d-flex mb-4">
        @can('restore', App\Model\User::class)
        <form action="{{ route('users.restore') }}" method="post" class="mr-3">
            @csrf
            @method('put')
            <x-popup-window :process="'Restore All'" :color="'warning'" :id="'ra'" :button='1'/>
        </form>
        @endcan

        @can('forceDelete', App\Model\User::class)
        <form action="{{ route('users.force-delete') }}" method="post">
            @csrf
            @method('delete')
            <x-popup-window :process="'Delete All'" :color="'danger'" :id="'da'" :button='1'/>
        </form>
        @endcan
    </div>

    <table class="table table-bordered">
        <thead  style="position: sticky;top: 0">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Image') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('User Type') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Roles') }}</th>
                <th>{{ __('Country') }}</th>
                <th>{{ __('Deleted At') }}</th>
                <th style="width:88px">{{ __('Oprations') }}</th>
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
                    <td class="text-bold" onclick="location.href='{{ route('roles.index') }}';"> 
                        @foreach ($user->roles as $role) 
                        {{ "($role->name) " }} 
                        @endforeach 
                    </td>
                    <td> {{ $user->country->name }} </td>
                    <td> {{ $user->deleted_at->diffForHumans() }} </td>

                    <td class="d-flex justify-content-between">
                        @can('restore', App\Model\User::class)
                        <form action="{{ route('users.restore', $user->id) }}" method="post">
                            @csrf
                            @method('put')
                            <x-popup-window :process="'Restore'" :color="'primary'" :id="$loop->iteration.'r'" :icon="'fa-trash-restore'"/>
                        </form>
                        @endcan

                        @can('forceDelete', App\Model\User::class)
                        <form action="{{ route('users.force-delete', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <x-popup-window :process="'Delete'" :color="'danger'" :id="$loop->iteration.'d'" :icon="'fa-trash-alt'"/>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($users->isEmpty())
        <div style="text-align: center; margin-top: 15%">
            <h2><b> {{ __('The Trash Is Empty') }} </b></h2>
        </div>
    @endif

    {{ $users->withQueryString()->links() }}
@endsection
