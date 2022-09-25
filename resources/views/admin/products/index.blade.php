@extends('layouts.admin')

@section('title')
    <div class="ml-5 justify-content-between">
        <h2 class="font-weight-bold">{{ __($title) }}</h2>
        <div>
            @can('create', App\Model\Product::class)
            <a class="btn btn-sm btn-outline-primary font-weight-bold" href="{{ route('products.create') }}">{{ __('Create') }}</a>
            @endcan
            @can('restore', App\Model\Product::class)
            <a class="btn btn-sm btn-outline-danger font-weight-bold" href="{{ route('products.trash') }}">{{ __('Trash') }}</a>
            @endcan
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item font-weight-bold"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item font-weight-bold">{{ __('Products') }}</li>
    </ol>
@endsection

{{-- Search Bar --}}
<x-search-bar :options="$options"/>

@section('content')

    {{ $products->withQueryString()->links() }}
    <table class="table table-bordered table-sm">
        <thead  style="position: sticky;top: 0">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Image') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('User Name') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Price') }}</th>
                <th>{{ __('Qty.') }}</th>
                <th>{{ __('Rate') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Created At') }}</th>
                <th style="width:134px">{{ __('Oprations') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td> <img src="{{ $product->image_url }}" alt="TheDarkSaber" width="80"></td>
                    <td> {{ $product->name }} </td>
                    <td> {{ $product->user->name }} </td>
                    <td> {{ $product->description }} </td>
                    <td> @if ($product->category->name) {{  $product->category->name  }} @else {{ __('No Category') }} @endif</td> {{-- {{ $product->category->parent->name }} --}}
                    <td> {{ App\Helpers\Currency::format($product->price) }} </td>
                    <td><b> {{ $product->quantity }} </b></td>
                    <td> {{ round($product->ratings->avg('rating'),1) }} </td>
                    <td> <div class="btn btn-sm @if ($product->status == 'active') btn-success @else btn-warning @endif" onclick="document.getElementById('cahngestatus{{ $product->id }}').submit()">{{ __($product->status) }}</div></td>
                    <form action="{{ route('products.change-status', $product->id) }}" method="post" id="cahngestatus{{ $product->id }}" style="display: none">
                        @csrf
                    </form>
                    <td> {{ $product->created_at->diffForHumans() }} </td>
                    <td class="d-flex justify-content-between ">
                        @can('view', $product)
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-success" title="{{ __('Show') }}"><i class="fas fa-eye"></i></a>
                        @endcan
                        @can('update', $product)
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary" title="{{ __('Edit') }}"><i class="fas fa-edit"></i></a>
                        @endcan

                        @can('delete', $product)
                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
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

    {{ $products->withQueryString()->links() }}
@endsection
