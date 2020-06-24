@extends('layouts.master')

@section('title', __('main.product'))

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ route('categories') }}">@lang('main.categories')</a></li>
        <li><a href="{{ route('category', $skus->product->category->code) }}">{{ $skus->product->category->name }}</a></li>
        <li class="active">{{ $skus->product->__('name') }}</li>

    </ol>
    <div class="starter-template">
    <h1>{{ $skus->product->__('name') }}</h1>
    <h2>{{ $skus->product->category->name }}</h2>
    @if(!$skus->isAvailable())
        <div class="alert alert-info" role="alert">
            <h4>@lang('product.not_available')</h4>
            <h4 class="alert-info">@lang('product.tell_me'):</h4>
            <div class="warning">
                @if($errors->get('email'))
                    {!! $errors->get('email')[0] !!}
                @endif
            </div>
            <form method="POST" class="form-inline" action="{{ route('subscription', $skus) }}">
                @csrf
                <div class="form-group ">
                    <div class="row">
                        <input  type="email" class="form-control"
                               name="email" value="" required autofocus>
                        <button type="submit" class="btn btn-primary">@lang('product.subscribe')</button>
                    </div>
                </div>
            </form>
        </div>


    @endif
    @isset($skus->product->properties)
        @foreach ($skus->propertyOptions as $propertyOption)
            <h4>{{ $propertyOption->property->__('name') }}: {{ $propertyOption->__('name') }}</h4>
        @endforeach
    @endisset

    <h4>@lang('main.properties.price'): {{ \App\Models\Product::getPriceAttribute($skus->price) }} {{ $currencySymbol }}</h4>
    <h4>@lang('main.properties.count'): {{ $skus->count }}</h4>

    <img src="{{ Storage::url($skus->product->image) }}">
    <h3>{{ $skus->product->__('description') }}</h3>

    @if($skus->isAvailable())
        <form action="{{ route('basket-add', $skus->product) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success " role="button">@lang('product.add_to_cart')</button>

            @auth
                @if(!in_array($skus->id, Auth::user()->getFavoritesSkuIds()))
                    <a href="{{ route('personal.favorites.skus.add', [$skus->id]) }}"
                       class="btn btn-primary"
                       role="button">@lang('main.add_to_favorites')</a>
                @else
                    <a href="{{ route('personal.favorites.skus.remove', [$skus->id]) }}"
                       class="btn btn-danger"
                       role="button">@lang('main.delete_from_favorites')</a>
                @endif
            @endauth
        </form>
    @endif
    </div>
@endsection
