@extends('layouts.admin')

@section('title')
    <div class="ml-5 justify-content-between">
        <h2 class="font-weight-bold">{{ __($title) }}</h2>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item font-weight-bold"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item font-weight-bold">{{ __('Orders') }}</li>
    </ol>
@endsection

{{-- Search Bar --}}
<x-search-bar/>

@section('content')

    {{ $orders->withQueryString()->links() }}
    <table class="table table-bordered table-sm">
        <thead  style="position: sticky;top: 0">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Number') }}</th>
                <th>{{ __('User Name') }}</th>
                <th>{{ __('Payment Status') }}</th>
                <th>{{ __('Billing Name') }}</th>
                <th>{{ __('Billing Email') }}</th>
                <th>{{ __('Total Price') }}</th>
                <th>{{ __('Order status') }}</th>
                <th>{{ __('Created At') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td> {{ $order->id }} </td>
                    <td> {{ $order->number }} </td>
                    <td> {{ $order->user->name ?? __('Quest')}} </td>
                    <td> {{ $order->payment_status }} </td>
                    <td> {{ $order->billing_name }} </td>
                    <td> {{ $order->billing_email }} </td>
                    <td> {{ App\Helpers\Currency::format($order->total) }} </td>
                    <td> <div class="btn btn-sm  @if ($order->status == 'pending') btn-warning
                                                @elseif ($order->status == 'cancelled') btn-danger
                                                @elseif ($order->status == 'processing') btn-primary
                                                @elseif ($order->status == 'shipped') btn-primary
                                                @elseif ($order->status == 'complete') btn-success @endif" 
                                                onclick="document.getElementById('cahngestatus{{ $order->id }}').submit()">{{ __($order->status) }}</div></td>
                    <form action="{{ route('orders.change-status', $order->id) }}" method="post" id="cahngestatus{{ $order->id }}" style="display: none">
                        @csrf
                    </form>
                    <td> {{ $order->created_at->diffForHumans() }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $orders->withQueryString()->links() }}
@endsection
