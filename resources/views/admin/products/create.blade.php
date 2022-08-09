@extends('layouts.admin')

@section('title', __('Create A New Product'))

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Create') }}</li>
</ol>
@endsection

@section('content')

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    {{-- {{ csrf_field() }} --}} <!--same action--> 
    @csrf <!--same action-->

        @include('admin.products._form', [
            'button' => 'Add'
        ])
        
    </form>

@endsection