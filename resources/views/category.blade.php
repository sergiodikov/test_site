@extends('layouts.master')

@section('title', __('main.category') . $category->__('name'))

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ route('categories') }}">@lang('main.categories')</a></li>
        <li class="active">{{$category->__('name')}}</li>
    </ol>
    <div class="starter-template">
    <h1>
        {{$category->__('name')}}
    </h1>
    <p>
        {{ $category->__('description') }}
    </p>
    <div class="row">
        @foreach($category->products->map->skus->flatten() as $sku)
            @include('layouts.card', compact('sku'))
        @endforeach
    </div>
    </div>
@endsection
