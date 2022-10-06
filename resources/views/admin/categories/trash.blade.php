@extends('layouts.admin')

@section('title')
    <div class="d-flex justify-content-between">
        <h2>{{ __('Trashed Categories') }}</h2>
        <div class="">
            @can('create', App\Model\Category::class)
            <a class="btn btn-sm btn-outline-primary" href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
            @endcan
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('Categories') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Trash') }}</li>
    </ol>
@endsection

{{-- Search Bar --}}
<x-search-bar :options="$options"/>

@section('content')

    <div class="d-flex mb-4">
        @can('restore', App\Model\Category::class)
        <form action="{{ route('categories.restore') }}" method="post" class="mr-3">
            @csrf
            @method('put')
            <x-popup-window :process="'Restore All'" :color="'warning'" :id="'ra'" :button='1'/>
        </form>
        @endcan

        @can('forceDelete', App\Model\Category::class)
        <form action="{{ route('categories.force-delete') }}" method="post">
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
                <th>{{ __('description') }}</th>
                <th>{{ __('Parent Name') }}</th>
                <th>{{ __('Products Count') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Deleted At') }}</th>
                <th style="width:88px">{{ __('Oprations') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td> {{ $category->id }}</td>
                    <td> <img src="{{ $category->image_url }}" alt="TheDarkSaber" width="80"></td>
                    <td> {{ $category->name }}</td>
                    <td> {{ $category->description }}</td>
                    <td> {{ @$category->parent->name }}</td> {{-- @ for escape the empty result --}}
                    <td> {{ $category->count }}</td> {{-- products as count --}}
                    <td> <div class="btn btn-sm  @if ($category->status == 'active') btn-success @else btn-warning @endif">{{ __($category->status) }}</div></td>
                    <td> {{ $category->deleted_at->diffForHumans() }}</td>

                    <td class="d-flex justify-content-between">
                        @can('restore', App\Model\Category::class)
                        <form action="{{ route('categories.restore', $category->id) }}" method="post">
                            @csrf
                            @method('put')
                            <x-popup-window :process="'Restore'" :color="'primary'" :id="$loop->iteration.'r'" :icon="'fa-trash-restore'"/>
                        </form>
                        @endcan
                    
                        @can('forceDelete', App\Model\Category::class)
                        <form action="{{ route('categories.force-delete', $category->id) }}" method="post">
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
    @if ($categories->isEmpty())
        <div style="text-align: center; margin-top: 15%">
            <h2><b> {{ __('The Trash Is Empty') }} </b></h2>
        </div>
    @endif

    {{ $categories->withQueryString()->links() }}
@endsection
