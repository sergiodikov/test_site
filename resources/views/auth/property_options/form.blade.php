@extends('auth.layouts.master')

@isset($propertyOption)
    @section('title', 'Редактировать вариант свойства ' . $propertyOption->name)
@else
    @section('title', 'Создать вариант свойства')
@endisset

@section('content')
    <div class="page-header text-center">
        @isset($propertyOption)
            <h1>Редактирование варианта свойства <b>{{ $propertyOption->name }}</b></h1>
        @else
            <h1>Добавлеие варианта свойства</h1>
        @endisset
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data"
                  @isset($propertyOption)
                  action="{{ route('property-options.update', [$property, $propertyOption]) }}"
                  @else
                  action="{{ route('property-options.store', $property) }}"
                @endisset
            >
                    @isset($propertyOption)
                        @method('PUT')
                    @endisset
                    @csrf
                    <div>
                        <h3>Свойство: {{ $property->name }}</h3>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Название: </label>
                        <div class="col-sm-6">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" name="name" id="name"
                                   value="@isset($propertyOption){{ $propertyOption->name }}@endisset">
                        </div>
                    </div>

                    <br>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Название en: </label>
                        <div class="col-sm-6">
                            @error('name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" name="name_en" id="name_en"
                                   value="@isset($propertyOption){{ $propertyOption->name_en }}@endisset">
                        </div>
                    </div>

                    <button class="btn btn-success">Сохранить</button>

            </form>
        </div>
    </div>
@endsection
