@extends('layouts.master')

@section('title', __('main.all_categories'))

@section('content')
    <div class="starter-template">
    <div class="page-header text-center"><h1>Категории</h1></div>
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
