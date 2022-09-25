@extends('layouts.admin')

@section('title')
    <div class="ml-5 justify-content-between">
        <h2 class="font-weight-bold">{{ __($title) }}</h2>
        <div>
            @can('create', App\Model\Role::class)
            <a class="btn btn-sm btn-outline-primary font-weight-bold" href="{{ route('roles.create') }}">{{ __('Create') }}</a>
            @endcan
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item font-weight-bold"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item font-weight-bold">{{ __('Roles') }}</li>
    </ol>
@endsection

{{-- Search Bar --}}
<x-search-bar/>

@section('content')

    <table class="table table-bordered table-sm">
        <thead  style="position: sticky;top: 0">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Role Name') }}</th>
                <th class=" text-center">{{ __('Abilities') }}</th>
                <th>{{ __('User/s Name') }}</th>
                <th>{{ __('Created At') }}</th>
                <th style="width:179px">{{ __('Oprations') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td> {{ $role->name }} </td>
                    <td> @foreach ($role->abilities as $ability){{ $ability }}/ @endforeach</td>
                    <td> @foreach ($role->users as $user)
                        {{ $user->name . " , "}}
                        @endforeach 
                    </td>
                    <td> {{ $role->created_at->diffForHumans() }} </td>
                    <td class="d-flex justify-content-between ">
                        @can('view', $role)
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-success" title="{{ __('Show') }}"><i class="fas fa-eye"></i></a>
                        @endcan
                        @can('update', $role)
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-primary" title="{{ __('Edit') }}"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can('assignUser', $role)
                        <a href="{{ route('roles.assign-user', $role->id) }}" class="btn btn-sm btn-success" title="{{ __('Assgin role to user') }}"><i class="fas fa-users"></i></a>
                        @endcan

                        @can('delete', $role)
                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
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

    {{ $roles->withQueryString()->links() }}
@endsection
