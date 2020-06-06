<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Интернет Магазин: </title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=3zmOg0pp-uTnpcqXOwT6FDbkb9oeXnGkxS891GSWotW_48cR7MoxzEDo2Q8jBHNK" charset="UTF-8"></script><script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href=" {{route('index')}}">Интернет Магазин</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{route('index')}}">Все товары</a></li>
                <li><a href="{{route('categories')}}">Категории</a></li>
                <li><a href="{{route('basket')}}">В корзину</a></li>
                <li><a href="{{route('index')}}">Сбросить{{-- проект в начальное состояние--}}</a></li>
                <li><a href="http://internet-shop.tmweb.ru/locale/en">en</a></li>

                {{--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">₽<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://internet-shop.tmweb.ru/currency/RUB">₽</a></li>
                        <li><a href="http://internet-shop.tmweb.ru/currency/USD">$</a></li>
                        <li><a href="http://internet-shop.tmweb.ru/currency/EUR">€</a></li>
                    </ul>
                </li>--}}
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{route('login')}}">Панель администратора</a></li>
                    @endguest
                @auth
                    <li><a href="{{route('home')}}">Панель администратора</a></li>
                    <li><a href="{{route('get-logout')}}">Выйти</a></li>
                    @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @if(session()->has('success'))
    <p class="alert alert-success">{{session()->get('success')}}</p>
      @endif
        @if(session()->has('warning'))
        <p class="alert alert-warning">{{session()->get('warning')}}</p>
        @endif
        @yield('content')
</div>
</body>
</html>
