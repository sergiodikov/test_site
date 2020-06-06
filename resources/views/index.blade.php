@extends('layouts.master')

@section('title', 'Главное')

@section('content')
        {{--<p class="alert alert-success">The Project was reset</p>--}}
        <h1>Все товары</h1>
        <form method="GET" action="http://internet-shop.tmweb.ru">
            <div class="filters row">
                @foreach($products as $product)
                @include('layouts.card', compact('product'))
                @endforeach
            </div>
        </form>
@endsection
