@extends('layouts.master')

@section('title', __('basket.place_order'))

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ route('basket') }}">@lang('main.cart')</a></li>
        <li class="active">Подтверждениие заказа</li>
    </ol>
    <div class="page-header text-center">
        <h1>@lang('basket.approve_order')<br> <small> @lang('basket.personal_data')</small></h1>
    </div>
    <div class="container">
            <h3 class="text-center">@lang('basket.full_cost'): {{ $order->getFullSum() }} {{ $currencySymbol }}.</h3>

            <div class="row">
                <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
                    <form action="{{ route('basket-confirm') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group ">
                            <label for="name">@lang('basket.data.name')</label>
                            <input type="text" name="name" id="name" value="" class="form-control">
                        </div>

                        <div class="form-group ">
                            <label for="phone">@lang('basket.data.phone')</label>
                            <input type="text" name="phone" id="phone" value="" class="form-control">
                        </div>

                        @guest
                        <div class="form-group ">
                            <label for="email">@lang('basket.data.email')</label>
                            <input type="text" name="email" id="email" value="" class="form-control">
                        </div>
                        @endguest

                        <div class="form-group row centered">
                            <div class="">
                                <input type="submit" class="btn btn-success" value="@lang('basket.approve_order')">
                            </div>
                        </div>
                    </form>
        </div>
    </div>
    </div>
@endsection
