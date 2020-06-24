@extends('auth.layouts.master')

@section('title', 'Sku ' . $sku->name)

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ route('products.index') }}">Товары</a></li>
        <li><a href="{{ route('skus.index', $product) }}">Товарные предложения, {{ $product->name }}</a></li>
        <li class="active">Sku {{ $sku->product->name }}: {{ $sku->getName() }} </li>
    </ol>
    <div class="page-header text-center"><h1>Sku {{ $sku->product->name }}: {{ $sku->getName() }}</h1></div>

    <table class="table">
        <tbody>
        <tr>
            <th>
                Поле
            </th>
            <th>
                Значение
            </th>
        </tr>
        <tr>
            <td>ID</td>
            <td>{{ $sku->id }}</td>
        </tr>
        <tr>
            <td>Цена</td>
            <td>{{ $sku->price }}</td>
        </tr>
        <tr>
            <td>Кол-во</td>
            <td>{{ $sku->count }}</td>
        </tr>

        @foreach($sku->propertyOptions as $propertyOption)
            <tr>
                <td>{{ $propertyOption->property->name }}</td>
                <td>{{ $propertyOption->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
