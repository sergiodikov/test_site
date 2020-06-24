@extends('layouts.master')

@section('title', 'Избранные товары')

@section('content')
    <div class="starter-template">
        <div class="page-header"><h1>Избранные товары</h1></div>
    <div class="row">
        @foreach($favoriteSkus as $sku)

            @include('layouts.card', compact('sku'))
        @endforeach
    </div>
    </div>
@endsection
