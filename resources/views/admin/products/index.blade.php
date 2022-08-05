@extends('layouts.admin')

@section('title')
    <div class="d-flex justify-content-between">
        <h2> {{ $title }} </h2>
        <div>
            {{-- @can('create', 'App\Model\Product') --}}
            {{-- @can('create', App\Model\Product::class) --}}
            <a class="btn btn-sm btn-outline-primary" href="{{ route('products.create') }}">Create</a>
            {{-- @endcan --}}
            <a class="btn btn-sm btn-outline-danger" href="{{ route('products.trash') }}">Trash</a>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Products</li>
    </ol>
@endsection

{{-- Search Bar --}}
<x-search-bar :options="$options"/>

@section('content')

    <x-alert />

    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Qty.</th>
                <th>Status</th>
                <th>Ceated At</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td> <img src="{{ $product->image_url }}" alt="TheDarkSaber" width="80"></td>
                    <td> {{ $product->name }} </td>
                    <td> {{ $product->description }} </td>
                    <td> {{ $product->category->name }} / {{ $product->category->parent->name }} </td>
                    <td> {{ $product->formatted_price }} </td>
                    <td> {{ $product->quantity }} </td>
                    <td> {{ $product->status }} </td>
                    <td> {{ $product->created_at }} </td>
                    <td> 
                        {{-- @can('update', $product) --}}
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-dark">Edit</a> </td>
                        {{-- @endcan --}}
                    <td>
                        {{-- @can('delete', $product) --}}
                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        {{-- @endcan --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->withQueryString()->links() }}
@endsection
