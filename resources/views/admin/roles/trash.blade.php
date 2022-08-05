@extends('layouts.admin')

@section('title')
<div class="d-flex justify-content-between">
    <h2>Trashed Products</h2>
    <div class="">
        <a class="btn btn-sm btn-outline-primary" href="{{ route('products.index') }}">Products</a>
        <a class="btn btn-sm btn-outline-dark" href="{{ route('products.trash') }}">Trash</a>
    </div>
</div>
Products <a href="{{ route('products.create') }}">Create</a>
@endsection

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Products</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('content')


    <x-alert />


    <div class="d-flex mb-4">
        <form action="{{ route('products.restore') }}" method="post" class="mr-3">
            @csrf
            @method('put')
            <button type="submit" class="btn btn-sm btn-warning">Restore All</button>
        </form>

        <form action="{{ route('products.force-delete') }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger">Delete All</button>
        </form>
    </div>

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
            <th>Deleted At</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td> <img src="{{asset('storage/' . $product->image_path)}}" alt="TheDarkSaber" width="80"></td>
            <td> {{ $product->name }} </td>
            <td> {{ $product->description }} </td>
            <td> {{ $product->category_name }} </td>
            <td> {{ $product->price }} </td>
            <td> {{ $product->quantity }} </td>
            <td> {{ $product->status }} </td>
            <td> {{ $product->deleted_at }} </td>
            
            <td> <form action="{{ route('products.restore', $product->id) }}" method="post">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-sm btn-warning">Restore</button>
                </form>
            </td>

            <td> <form action="{{ route('products.force-delete', $product->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger">Delete Forever</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    {{ $products->links() }}

@endsection