@extends('auth.layouts.master')

@section('title', 'Sku ' . $sku->name)

@section('content')
    <div class="page-header text-center"><h1>Sku {{ $sku->product->name }}</h1></div>
    <h2>{{ $sku->propertyOptions->map->name->implode(', ') }}</h2>
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
        </tbody>
    </table>
@endsection
