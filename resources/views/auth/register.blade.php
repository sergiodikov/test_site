@extends('auth.layouts.master')
@section('title', 'Регистрация')

@section('content')

    <div class="page-header text-center"><h1>Регистрация</h1></div>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
            <form method="POST" action="{{route('register')}}" aria-label="Register">
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
                    <label for="name" class="">Имя</label>
                    <input id="name" type="text" class="form-control" name="name"
                           value="" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email" class="">E-Mail</label>
                    <input id="email" type="email" class="form-control"
                           name="email" value="" required>
                </div>

                <div class="form-group">
                    <label for="password" class="">Пароль</label>
                    <input id="password" type="password" class="form-control"
                           name="password" required>
                </div>

                <div class="form-group ">
                    <label for="password-confirm" class="">Подтвердите пароль</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required>
                </div>

                <div class="form-group row centered">
                    <div class="col-sm-4 col-md-4">
                        <button type="submit" class="btn btn-primary">
                            Зарегистрироваться
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
