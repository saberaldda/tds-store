@extends('layouts.admin')

@section('title')
    <div class="ml-5">
        <h2 class="font-weight-bold"><i class="far fa-bell"></i> {{ __($title) }}
            <span class="badge badge-warning unread">{{ $unread }}</span>
        </h2>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item font-weight-bold"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item font-weight-bold">{{ __('Notifications') }}</li>
    </ol>
@endsection

{{-- Search Bar --}}
<x-search-bar />

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th style="width:70px">{{ __('') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifications as $notification)
                <tr>
                    <td>
                        <div id="notifications">
                            <a href="{{ route('notifications.read', $notification->id) }}" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i>
                                @if ($notification->unread())
                                    <b>*</b>
                                @endif
                                {{ $notification->data['title'] }}
                                <span
                                    class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                            </a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </td>
                    <td class="d-flex justify-content-between ">
                        {{-- @can('view', $product) --}}
                        {{-- <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-success" title="{{ __('Show') }}"><i class="fas fa-eye"></i></a> --}}
                        {{-- @endcan --}}
                        {{-- @can('update', $product) --}}
                        {{-- <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary" title="{{ __('Edit') }}"><i class="fas fa-edit"></i></a> --}}
                        {{-- @endcan --}}
                        <form action="{{ route('notifications.delete', $notification->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <x-popup-window :process="'Delete'" :color="'danger'" :id="$loop->iteration" :icon="'fa-trash'"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{ $notifications->withQueryString()->links() }} --}}
@endsection
