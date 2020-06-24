@extends('auth.layouts.master')

@section('title', 'Вариант свойства ' . $propertyOption->name)

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ route('properties.index') }}">Свойства</a></li>
        <li><a href="{{ route('property-options.index', $property) }}">Варианты свойства: {{ $property->name }}</a></li>
        <li class="active">Значение свойства: {{ $property->name }}, {{ $propertyOption->name }}</li>
    </ol>
    <div class="page-header text-center">
        <h1>Значение свойства {{ $propertyOption->name }}</h1>
    </div>
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
                <td>{{ $propertyOption->id }}</td>
            </tr>
            <tr>
                <td>Свойство</td>
                <td>{{ $propertyOption->property->name }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $propertyOption->name }}</td>
            </tr>
            <tr>
                <td>Название en</td>
                <td>{{ $propertyOption->name_en }}</td>
            </tr>
            </tbody>
        </table>
@endsection
