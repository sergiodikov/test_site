<nav class="navbar navbar-inverse navbar-fixed-top navbar-laravel">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}">@lang('main.online_shop')</a>
        </div>

        <div id="navbar-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li @routeactive('index')><a href="{{ route('index') }}">@lang('main.all_products')</a></li>
                <li @routeactive('categor*')><a href="{{ route('categories') }}">@lang('main.categories')</a></li>
                <li @routeactive('basket*')><a href="{{ route('basket') }}">@lang('main.cart')</a></li>
                <li><a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang_title')</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $currencySymbol }}</a>
                    <ul class="dropdown-menu">
                        @foreach ($currencies as $currency)
                            <li><a href="{{ route('currency', $currency->code) }}">{{ $currency->symbol }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">@lang('main.login')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">@lang('main.register')</a>
                    </li>
                @endguest

                @auth

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" v-pre>
                            @admin @lang('main.administrator') @else {{ Auth::user()->name }} @endadmin
                        </a>
                        <ul class="dropdown-menu">
                            @admin
                            <li><a href="{{ route('categories.index') }}">@lang('main.category_editing')</a></li>
                            <li><a href="{{ route('products.index') }}">@lang('main.product_editing')</a>
                            <li><a href="{{ route('properties.index') }}">@lang('main.property_editing')</a></li>
                            <li><a href="{{ route('home') }}">@lang('main.all_orders')</a></li>
                            @endadmin
                            <li><a href="{{ route('person.orders.index') }}">@lang('main.my_orders')</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout')}}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    @lang('main.logout')
                                </a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout')}}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
