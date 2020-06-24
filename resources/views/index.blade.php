@extends('layouts.master')

@section('title', __('main.title'))

@section('content')
    <div class="starter-template">
    <div class="page-header text-center"><h1>@lang('main.all_products')</h1></div>
    <div class="filters">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="GET" action="{{route("index")}}">
            <div class="row">
                <div class="col-sm-10 col-md-10">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <label for="price_from">@lang('main.price_from')
                                <input type="text" name="price_from" id="price_from" size="6" value="{{ request()->price_from}}">
                            </label>
                            <label for="price_to">@lang('main.to')
                                <input type="text" name="price_to" id="price_to" size="6"  value="{{ request()->price_to }}">
                            </label>
                        </div>
                        <div class="clearfix visible-xs-block"></div>
                        <div class="col-sm-4 col-md-4">
                            <label for="hit">
                                <input type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked @endif> @lang('main.properties.hit')
                            </label>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <label for="new">
                                <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif> @lang('main.properties.new')
                            </label>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <label for="recommend">
                                <input type="checkbox" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif> @lang('main.properties.recommend')
                            </label>
                        </div>
                    </div>

                </div>
                <div class="col-sm-2 col-md-2">
                    <div class="row centered">
                        <div class="col-xs-5 col-sm-12 col-md-12">

                            <button type="submit" class="btn btn-sm btn-primary btn-block">@lang('main.filter')</button>
                            <a href="{{ route("index") }}" class="btn btn-sm btn-warning btn-block">@lang('main.reset')</a>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <hr>
    </div>

    <div class="row text-center">
        @php
            $i=0;
        @endphp
        @foreach($skus as $sku)
            @php
                $i++
            @endphp
            @include('layouts.card', compact('sku'))
            @if($i%2)
                <div class="clearfix visible-sm-block"></div>
            @endif
            @if($i%3)
                <div class="clearfix visible-md-block"></div>
            @endif
        @endforeach
    </div>
    {{ $skus->links() }}
    </div>
@endsection
