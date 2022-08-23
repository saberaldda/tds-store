@extends('layouts.admin')

@section('title')
    <div class="ml-5 justify-content-between">
        <h2 class="font-weight-bold">{{ __($title) }}</h2>
        <div>
            @can('create', App\Model\Country::class)
            <a class="btn btn-sm btn-outline-primary font-weight-bold" href="{{ route('countries.create') }}">{{ __('Create') }}</a>
            @endcan
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item font-weight-bold"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item font-weight-bold">{{ __('Countries') }}</li>
    </ol>
@endsection

{{-- Search Bar --}}
<x-search-bar code=1/>

@section('content')

    <table class="table table-bordered">
        <thead>
            <tr>
                <form class="form-inline" id="form">
                    <th style="cursor: pointer;" onclick="document.getElementById('form').submit();">{{ __('ID') }} <i class="fas fa-angle-down"></i></th>
                </form>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Code') }}</th>
                <form class="form-inline" id="userform">
                    <input type="hidden" name="userNum" value="1">
                    <th style="cursor: pointer;" onclick="document.getElementById('userform').submit();"> {{ __('Users Count') }} <i class="fas fa-angle-down"></i></th>
                </form>
                <form class="form-inline" id="productform">
                    <input type="hidden" name="productNum" value="1">
                    <th style="cursor: pointer;" onclick="document.getElementById('productform').submit();"> {{ __('Products Count') }} <i class="fas fa-angle-down"></i></th>
                </form>
                <th style="width:70px">{{ __('Oprations') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries as $country)
                <tr>
                    <td>{{ $country->id }}</td>
                    <td> {{ $country->name }} </td>
                    <td> {{ $country->code }} </td>
                    <td>{{ $country->users_count }}</td>
                    <td>{{ $country->products_count }}</td>
                    <td class="center">
                        @can('delete', $country)
                        <form action="{{ route('countries.destroy', $country->id) }}" method="post">
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

    {{ $countries->withQueryString()->links() }}
@endsection
