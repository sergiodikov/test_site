@extends('auth.layouts.master')

@section('title', 'Заказ ' . $order->id)

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ route('personal.orders.index') }}">@lang('main.my_orders')</a></li>
        <li class="active">Заказ №{{ $order->id }}</li>
    </ol>
    <div class="starter-template">
        <h1>Заказ №{{ $order->id }}</h1>
        <p>Заказчик: <b>{{ $order->name }}</b></p>
        <p>Номер телефона: <b>{{ $order->phomne }}</b></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Стоимость</th>
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
                <td colspan="3">Общая стоимость:</td>
                <td>{{ $order->sum }} {{ $order->currency->symbol }}</td>
            </tr>
            </tbody>
        </table>
        <br>

    </div>
@endsection
