@extends('layouts.admin')

@section('title', __('Edit Product'))

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Edit') }}</li>
</ol>
@endsection

@section('content')

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        
        @include('admin.products._form', [
            'button' => 'Update'
        ])
        
    </form>

@endsection