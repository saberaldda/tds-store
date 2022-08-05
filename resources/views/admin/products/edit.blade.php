@extends('layouts.admin')

@section('title', 'Edit Product')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('content')

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        {{-- <input type="hidden" name="_method" value="put"> --}}
        
        @include('admin.products._form', [
            'button' => 'Update'
        ])
        
    </form>

@endsection