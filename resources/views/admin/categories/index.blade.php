@extends('layouts.admin')

@section('title')
    <div class="ml-5 justify-content-between">
        <h2 class="font-weight-bold">{{ __($title) }}</h2>
        <div>
            @can('create', App\Model\Category::class)
            <a class="btn btn-sm btn-outline-primary font-weight-bold" href="{{ route('categories.create') }}">{{ __('Create') }}</a>
            @endcan
            @can('restore', App\Model\Category::class)
            <a class="btn btn-sm btn-outline-danger font-weight-bold" href="{{ route('categories.trash') }}">{{ __('Trash') }}</a>
            @endcan
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item font-weight-bold"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item active font-weight-bold">{{ __('Categories') }}</li>
    </ol>
@endsection

{{-- Search Bar --}}
<x-search-bar :options="$options"/>

@section('content')

    <table class="table text-center table-bordered">
        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Image') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('description') }}</th>
                <th>{{ __('Parent Name') }}</th>
                <th>{{ __('Products Count') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Ceated At') }}</th>
                <th style="width:134px">{{ __('Oprations') }}</th>
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
                    <td> {{ $category->created_at }}</td>
                    <td class="d-flex justify-content-between ">
                        @can('view', $category)
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-success" title="{{ __('Show') }}"><i class="fas fa-eye"></i></a>
                        @endcan
                        @can('update', $category)
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary" title="{{ __('Edit') }}"><i class="fas fa-edit"></i></a>
                        @endcan

                        @can('delete', $category)
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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

    {{ $categories->withQueryString()->links() }}

@endsection
