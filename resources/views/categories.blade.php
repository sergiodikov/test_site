<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Интернет Магазин: Все Категории</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=LC1236NOY6-ykgRdqI7tBArYkEaQ0y3p_kUA1Pl2f_rn6Soww3AhP681UpjpGxZUmfcjIocYjgGo43yLOfh_YQ" charset="UTF-8"></script><script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="http://internet-shop.tmweb.ru">Интернет Магазин</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="http://internet-shop.tmweb.ru">Все товары</a></li>
                <li class="active"><a href="http://internet-shop.tmweb.ru/categories">Категории</a>
                </li>
                <li ><a href="http://internet-shop.tmweb.ru/basket">В корзину</a></li>
                <li><a href="http://internet-shop.tmweb.ru/reset">Сбросить проект в начальное состояние</a></li>
                <li><a href="http://internet-shop.tmweb.ru/locale/en">en</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">₽<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://internet-shop.tmweb.ru/currency/RUB">₽</a></li>
                        <li><a href="http://internet-shop.tmweb.ru/currency/USD">$</a></li>
                        <li><a href="http://internet-shop.tmweb.ru/currency/EUR">€</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://internet-shop.tmweb.ru/login">Войти</a></li>

            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="starter-template">
        @foreach($categories as $category)
            <div class="panel">
                <a href="/{{$category ->code}}">
                    <img src="http://internet-shop.tmweb.ru/storage/categories/mobile.jpg">
                    <h2>{{$category ->name}}</h2>
                </a>
                <p>
                   {{$category ->description }}
                </p>
            </div>
            @endforeach
    </div>
</div>
</body>
</html>
