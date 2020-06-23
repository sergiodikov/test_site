<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('main.online_shop'): @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>
@include('layouts.navbar')

<div class="container content">
    <div class="starter-template">
        @if(session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
        @endif
        @if(session()->has('warning'))
            <p class="alert alert-warning">{{ session()->get('warning') }}</p>
        @endif
    </div>
    @yield('content')

</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <p class="text-center">@lang('main.product_categories')</p>
                <ul class="list-unstyled">
                    @foreach($categories as $category)
                        <li class="text-center"><a href="{{ route('category', $category->code) }}">{{ $category->__('name') }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <p class="text-center">@lang('main.most_popular_products')</p>
                <ul class="list-unstyled">
                    @foreach ($bestSkus as $bestSku)
                        <li class="text-center"><a href="{{ route('sku',
                [$bestSku->product->category->code, $bestSku->product->code, $bestSku]) }}">
                                {{ $bestSku->product->__('name') }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="text-center">
            <p><a href="#">Врнутся наверх</a></p>
            <p>© 2020 @lang('main.online_shop')</p>
        </div>
    </div>
</footer>

</body>
</html>
