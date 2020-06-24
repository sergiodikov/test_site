@extends('auth.layouts.master')

@section('title', 'Товарные предложения')

@section('content')

    <div class="page-header text-center"><h1>Товарные предложения</h1></div>
    <h2>{{ $product->name }}</h2>
    <a class="btn btn-success" type="button"
       href="{{ route('skus.create', $product) }}">Добавить Sku</a>
    <hr>
    <table class="table">
        <tbody>
        <tr>
            <th>
                #
            </th>
            <th>
                Товарное предложение (свойства)
            </th>
            <th>
                Действия
            </th>
        </tr>
        @foreach($skus as $sku)
            <tr>
                <td>{{ $sku->id }}</td>
                <td>{{ $sku->propertyOptions->map->name->implode(', ') }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="{{ route('skus.destroy', [$product, $sku]) }}" method="POST">
                            <a class="btn btn-success" type="button" href="{{ route('skus.show', [$product, $sku]) }}">Открыть</a>
                            <a class="btn btn-warning" type="button" href="{{ route('skus.edit', [$product, $sku]) }}">Редактировать</a>
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Удалить"></form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        {{ $skus->links() }}


@endsection
