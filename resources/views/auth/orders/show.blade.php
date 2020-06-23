@extends('auth.layouts.master')

@section('title', __('order.order') . $order->id)

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ route('personal.orders.index') }}">@lang('main.my_orders')</a></li>
        <li class="active">@lang('order.order') №{{ $order->id }}</li>
    </ol>
    <div class="starter-template">
        <h1>@lang('order.order') №{{ $order->id }}</h1>
        <p>@lang('order.client') <b>{{ $order->name }}</b></p>
        <p>@lang('order.phone_number') <b>{{ $order->phomne }}</b></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>@lang('order.name_product')</th>
                <th>@lang('order.quantity')</th>
                <th>@lang('order.price')</th>
                <th>@lang('order.cost')</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($order->skus as $sku)
                <tr>
                    <td>
                        <a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku]) }}">
                            <img height="56px"
                                 src="{{ Storage::url($sku->product->image) }}">
                            {{ $sku->product->name }}
                        </a>
                    </td>
                    <td><span class="badge"> {{ $sku->pivot->count }}</span></td>
                    <td>{{ $sku->pivot->price }} {{ $order->currency->symbol }}</td>
                    <td>{{ $sku->pivot->price * $sku->pivot->count }} {{ $order->currency->symbol }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">@lang('order.total_cost')</td>
                <td>{{ $order->sum }} {{ $order->currency->symbol }}</td>
            </tr>
            </tbody>
        </table>
        <br>

    </div>
@endsection
