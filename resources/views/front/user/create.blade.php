@extends('front.user.layouts.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('public/assets/front/user/css/user.css') }}">
@endsection

@section('page-title', 'Регистрация')

@section('content')

    <body class="hold-transition register-page" style="background-color: #EDE9E6;">
        <div>
            <div class="card card-outline card-primary" style="border-top: 3px solid #816450;">
                <div class="card-header text-center">
                    <div class="h1"><b>Регистрация</b></div>
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
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="padding-inputs pt-20">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Полное имя" name="name"
                                    value="{{ old('name') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Почта" name="email"
                                    value="{{ old('email') }}">
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

                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Подтверждение пароля"
                                    name="password_confirmation">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <p class="role-header">Я:</p>
                            <div class="tile-section">
                                @foreach ($roles as $key => $value)
                                    <div class="tile-input">
                                        <input class="tile-checkbox" type="checkbox" name="role" id="{{ $key }}"
                                            value="{{ $key }}" @if (old('role') && intval(old('role')) === $key) selected @endif>
                                        <label class="tile-label" for="{{ $key }}">
                                            <span class="tile-icon {{ $key }}"></span>
                                            <h6 class="tile-title">{{ $value }}</h6>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="padding-inputs">
                            <div class="row">
                                <div class="col-4 offset-8">
                                    <button type="submit" class="btn btn-primary btn-block"
                                        style="background-color: #816450;border-color: #816450;">Далее</button>
                                </div>
                            </div>
                            <a href="{{ route('login.create') }}">У меня уже есть
                                аккаунт</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </body>

@section('scripts')
    <script src="{{ asset('public/assets/front/user/js/user.js') }}"></script>
@endsection

@endsection
