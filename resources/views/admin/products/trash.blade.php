@extends('layouts.admin')

@section('title')
    <div class="d-flex justify-content-between">
        <h2>{{ __('Trashed Products') }}</h2>
        <div class="">
            @can('viewAny', App\Model\Product::class)
            <a class="btn btn-sm btn-outline-primary" href="{{ route('products.index') }}">{{ __('Products') }}</a>
            @endcan
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Trash') }}</li>
    </ol>
@endsection

{{-- Search Bar --}}
<x-search-bar :options="$options"/>

@section('content')

    <div class="d-flex mb-4">
        @can('restore', App\Model\Product::class)
        <form action="{{ route('products.restore') }}" method="post" class="mr-3">
            @csrf
            @method('put')
            {{-- <button type="submit" class="btn btn-sm btn-warning">{{ __('Restore All') }}</button> --}}
            <x-popup-window :process="'Restore All'" :color="'warning'" :id="'ra'" :button='1'/>
        </form>
        @endcan

        @can('forceDelete', App\Model\Product::class)
        <form action="{{ route('products.force-delete') }}" method="post">
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
                <th>{{ __('Description') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Price') }}</th>
                <th>{{ __('Qty.') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Deleted At') }}</th>
                <th style="width:88px">{{ __('Oprations') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td> {{ $product->id }} </td>
                    <td> <img src="{{ $product->image_url }}" alt="TheDarkSaber" width="80"></td>
                    <td> {{ $product->name }} </td>
                    <td> {{ $product->description }} </td>
                    <td> @if ($product->category->name) {{  $product->category->name  }} @else {{ __('No Category') }} @endif</td>
                    <td> {{ App\Helpers\Currency::format($product->price) }} </td>
                    <td> {{ $product->quantity }} </td>
                    <td> <div class="btn btn-sm @if ($product->status == 'active') btn-success @else btn-warning @endif">{{ __($product->status) }}</div></td>
                    <td> {{ $product->deleted_at->diffForHumans() }} </td>

                    <td class="d-flex justify-content-between">
                        @can('restore', App\Model\Product::class)
                        <form action="{{ route('products.restore', $product->id) }}" method="post">
                            @csrf
                            @method('put')
                            <x-popup-window :process="'Restore'" :color="'primary'" :id="$loop->iteration.'r'" :icon="'fa-trash-restore'"/>
                        </form>
                        @endcan

                        @can('forceDelete', App\Model\Product::class)
                        <form action="{{ route('products.force-delete', $product->id) }}" method="post">
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
    @if ($products->isEmpty())
        <div style="text-align: center; margin-top: 15%">
            <h2><b> {{ __('The Trash Is Empty') }} </b></h2>
        </div>
    @endif

    {{ $products->withQueryString()->links() }}
@endsection
