@extends('auth.layouts.master')

@section('title', 'Заказы')

@section('content')
    <div class="col-md-12">
        <h1>@lang('order.order')</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    @lang('order.name')
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
                               href="{{ route('person.orders.show', $order) }}"
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
