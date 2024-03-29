@extends('front.user.layouts.layout')

@section('page-title', 'Авторизация')

@section('styles')
    <link rel="stylesheet" href="{{ asset('public/assets/front/user/css/user.css') }}">
@endsection

@section('content')

    <body class="hold-transition register-page" style="background-color: #EDE9E6;">
        <div>
            <div class="card card-outline card-primary" style="border-top: 3px solid #816450;">
                <div class="card-header text-center">
                    <div class="h1"><b>Авторизация</b></div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            <div class="list-unstyled">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="post">
                        @csrf

                        <div class="padding-inputs pt-20">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Почта" name="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Пароль" name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group">
                                <input type="checkbox" name="remember_me" id="remember_me">
                                <label class="checkbox-label" for="remember_me">Запомнить меня</label>

                            </div>
                            <div class="row pt-20">
                                <div class="col-4 offset-8">
                                    <button type="submit" class="btn btn-primary btn-block"
                                        style="background-color: #816450;border-color: #816450;">Войти</button>
                                </div>
                            </div>
                            <div style="display: flex; flex-direction: column; align-items: baseline;">
                                {{-- <a href="{{ route('login.create') }}" class="text-center">Забыл пароль</a> --}}
                                <a href="{{ route('register.create') }}" class="text-center">У меня нет
                                    аккаунта</a></a>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </body>

@endsection
