@extends('layouts.admin')

@section('title', __('Edit Category'))

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('Categories') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Edit') }}</li>
</ol>
@endsection

@section('content')

    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        {{-- <input type="hidden" name="_method" value="put"> --}}
        
        @include('admin.categories._form', [
            'button' => 'Update'
        ])
        
    </form>

@endsection