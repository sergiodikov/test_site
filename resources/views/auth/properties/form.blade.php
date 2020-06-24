@extends('auth.layouts.master')

@isset($property)
    @section('title', 'Редактировать свойство ' . $property->name)
@else
    @section('title', 'Создать свойство')
@endisset

@section('content')
    <div class="page-header text-center">
        @isset($property)
            <h1>Редактировать Свойство <b>{{ $property->name }}</b></h1>
        @else
            <h1>Добавить Свойство</h1>
        @endisset
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data"
                  @isset($property)
                  action="{{ route('properties.update', $property) }}"
                  @else
                  action="{{ route('properties.store') }}"
                @endisset
            >
                    @isset($property)
                        @method('PUT')
                    @endisset

                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Название: </label>
                        <div class="col-sm-6">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" name="name" id="name"
                                   value="@isset($property){{ $property->name }}@endisset">
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
                                   value="@isset($property){{ $property->name_en }}@endisset">
                        </div>
                    </div>

                    <button class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
