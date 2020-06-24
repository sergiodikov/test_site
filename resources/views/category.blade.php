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
        @php
            $i=0;
        @endphp
        @foreach($category->products->map->skus->flatten() as $sku)
            @php
                $i++
            @endphp
            @include('layouts.card', compact('sku'))
            @if(!($i%2))
                <div class="clearfix visible-sm-block"></div>
            @endif
            @if(!($i%3))
                <div class="clearfix visible-md-block"></div>
            @endif
        @endforeach
    </div>
    </div>
@endsection
