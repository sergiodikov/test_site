@extends('auth.layouts.master')
@section('title',  __('registration.profile'))

@section('content')

    <div class="page-header text-center"><h1>@lang('registration.profile')</h1></div>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
            <form method="POST" action="{{route('personal.profile.update')}}" aria-label="registration">
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
                    <label for="name" class="">@lang('registration.user_name')</label>
                    <input id="name" type="text" class="form-control" name="name"
                           value="{{ $user->name }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email" class="">E-Mail</label>
                    <input id="email" type="email" class="form-control"
                           name="email" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label for="password" class="">@lang('registration.password')</label>
                    <input id="password" type="password" class="form-control" name="password">
                </div>

                <div class="form-group ">
                    <label for="password-confirm" class="">@lang('registration.сonfirm_password')</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>

                <div class="form-group row centered">
                    <div class="col-sm-4 col-md-4">
                        <button type="submit" class="btn btn-primary">
                            @lang('registration.save')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
