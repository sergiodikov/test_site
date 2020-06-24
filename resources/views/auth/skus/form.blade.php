@extends('auth.layouts.master')

@isset($sku)
    @section('title', 'Редактировать Sku ' . $sku->name)
@else
    @section('title', 'Создать Sku')
@endisset

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('products.index') }}">Товары</a></li>
        <li><a href="{{ route('skus.index', $product) }}">Товарные предложения, {{ $product->name }}</a></li>
        <li class="active">
            @isset($sku)
                Редактирование Sku {{ $sku->product->name }}: {{ $sku->getName() }}
            @else
                Добавление Sku
            @endisset

        </li>
    </ol>
    <div class="page-header text-center">
        @isset($sku)
            <h1>Редактирование Sku {{ $sku->product->name }}: {{ $sku->getName() }}</h1>
        @else
            <h1>Добавление Sku</h1>
        @endisset
    </div>

    <div class="row">
        <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data"
                  @isset($sku)
                    action="{{ route('skus.update', [$product, $sku]) }}"
                  @else
                    action="{{ route('skus.store', $product) }}"
                  @endisset
            >
                @isset($sku)
                    @method('PUT')
                @endisset
                @csrf

                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'price'])
                        <input type="text" class="form-control" name="price"
                               value="@isset($sku){{ $sku->price }}@endisset">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="count" class="col-sm-2 col-form-label">Кол-во: </label>
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'count'])
                        <input type="text" class="form-control" name="count"
                               value="@isset($sku){{ $sku->count }}@endisset">
                    </div>
                </div>
                <br>

                @foreach ($product->properties as $property)
                    <div class="form-group row">
                        <label for="property_id[{{ $property->id }}]" class="col-sm-2 col-form-label">{{ $property->name }}: </label>
                        <div class="col-sm-6">
                            <select name="property_id[{{ $property->id }}]" class="form-control">
                                @foreach($property->propertyOptions as $propertyOption)
                                    <option value="{{ $propertyOption->id }}"
                                        @isset($sku)
                                            @if($sku->propertyOptions->contains($propertyOption->id))
                                                selected
                                            @endif
                                        @endisset
                                    >{{ $propertyOption->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endforeach

                <button class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
