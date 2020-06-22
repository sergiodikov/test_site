@extends('auth.layouts.master')
@section('title', 'Авторизация')

@section('content')
    <div class="page-header text-center"><h1>Авторизация</h1></div>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
            <form method="POST" action="{{route('login')}}" aria-label="Login">
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
                    <label for="email">E-Mail</label>
                    <input id="email" type="email" class="form-control"
                           name="email" value="" required autofocus>
                </div>

                <div class="form-group ">
                    <label for="password" class="">Пароль</label>
                    <input id="password" type="password" class="form-control"
                           name="password" required>
                </div>
                <div class="form-group row centered">
                    <div class="">
                        <button type="submit" class="btn btn-primary">
                            Войти
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
