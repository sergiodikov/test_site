@extends('auth.layouts.master')

@section('title', __('main.my_orders'))

@section('content')
    <div class="starter-template">

        <h1>@lang('order.orders')</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    @lang('order.name_client')
                </th>
                <th>
                    @lang('order.phone')
                </th>
                <th>
                    @lang('order.when_sent')
                </th>
                <th>
                    @lang('order.price')
                </th>
                <th>
                    @lang('order.action')
                </th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id}}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                    <td>{{ $order->sum }} {{ $order->currency->symbol }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-success" type="button"
                               @admin
                               href="{{ route('orders.show', $order) }}"
                               @else
                               href="{{ route('personal.orders.show', $order) }}"
                                @endadmin
                            >@lang('order.open')</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}

    </div>
@endsection
