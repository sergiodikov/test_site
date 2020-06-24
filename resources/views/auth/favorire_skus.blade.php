@extends('layouts.master')

@section('title', 'Избранные товары')

@section('content')
    <div class="starter-template">
        <div class="page-header"><h1>Избранные товары</h1></div>
    <div class="row">
        @php
            $i=0;
        @endphp
        @foreach($favoriteSkus as $sku)
            @php
                $i++
            @endphp
            @include('layouts.card', compact('sku'))
            @if(!($i%2))
                <div class="clearfix visible-sm-block"></div>
            @endif
            @if(!($i%3))
                <div class="clearfix visible-lg-block visible-md-block"></div>
            @endif
        @endforeach
    </div>
    </div>
@endsection
