@extends('user.layouts.layout')

@section('page-title', 'Регистрация')

@section('content')

    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="card card-outline card-primary">
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

                        <div class="row">
                            <div class="col-4 offset-8">
                                <button type="submit" class="btn btn-primary btn-block">Далее</button>
                            </div>
                        </div>

                    </form>
                    <a href="login.html" class="text-center">У меня уже есть аккаунт</a>
                </div>

            </div>
        </div>
        <script src="{{ asset('public/assets/admin/js/admin.js') }}"></script>
    </body>

@endsection
