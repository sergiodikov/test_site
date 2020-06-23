@extends('layouts.master')

@section('title', __('main.categories'))

@section('content')
    <div class="starter-template">
    <div class="page-header text-center"><h1>@lang('main.categories')</h1></div>
    @foreach($categories as $category)
        <div class="panel">
            <a href="{{ route('category', $category->code) }}">
                <img src="{{ Storage::url($category->image) }}">
                <h2>{{ $category->__('name') }}</h2>
            </a>
            <p>
                {{ $category->__('description') }}
            </p>
        </div>
    @endforeach
    </div>
@endsection
