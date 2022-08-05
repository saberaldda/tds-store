@extends('layouts.admin')

@section('title', 'Create A New Category')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Categories</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('content')

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">

    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    {{-- {{ csrf_field() }} --}} <!--same action--> 
    @csrf <!--same action-->

        @include('admin.categories._form', [
            'button' => 'Add'
        ])
        
    </form>

@endsection