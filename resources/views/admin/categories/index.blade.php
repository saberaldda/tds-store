@extends('layouts.admin')

@section('title')
    <div class="d-flex justify-content-between">
        <h2>{{ __($title) }}</h2>
        <div>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('categories.create') }}">{{ __('Create') }}</a>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item"><a href="#">{{ __('Categories') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Create') }}</li>
    </ol>
@endsection

{{-- Search Bar --}}
<x-search-bar :options="$options"/>

@section('content')

    <x-alert/>

    <table class="table">
        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ trans('Name') }}</th>
                <th>{{ __('Slug') }}</th>
                <th>@lang('Parent Name')</th>
                <th>{{ __('Products Count') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Ceated At') }}</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td> {{ $category->id }}</td>
                    <td> {{ $category->name }}</td>
                    <td> {{ $category->slug }}</td>
                    <td> {{ @$category->parent->name }}</td> {{-- @ for escape the empty result --}}
                    {{-- <td> {{ $category->products_count }}</td> --}}
                    <td> {{ $category->count }}</td> {{-- products as count --}}
                    <td> {{ $category->status }}</td>
                    <td> {{ $category->created_at }}</td>
                    <td> <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-dark">{{ __('Edit') }}</a>
                    </td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->withQueryString()->links() }}

@endsection
