@extends('layout')

@section('title', 'Регистрация')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        <section class="registration__user">
            <h1>Регистрация аккаунта</h1>
            <div class="registration-wrapper">
                <form class="registration__user-form form-create" method="post" action="{{ route('register.perform') }}">
                    @csrf
                    <label @if ($errors->has('email')) class="input-danger" @endif for="16">Электронная
                        почта</label>
                    <input class="input textarea" id="16" name="email" placeholder="ivan@email.com" autocomplete="off"
                        value="{{ old('email') }}" />
                    <span>{{ $errors->first('email') }}</span>

                    <label @if ($errors->has('name')) class="input-danger" @endif for="17">Ваше имя</label>
                    <input class="input textarea" id="17" name="name" placeholder="Иван Иванов" autocomplete="off"
                        value="{{ old('name') }}" />
                    <span>{{ $errors->first('name') }}</span>

                    <label @if ($errors->has('city_id')) class="input-danger" @endif for="18">Город
                        проживания</label>
                    <select id="18" class="multiple-select input town-select registration-town" size="1"
                        name="city_id">
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" @if ((int) old('city_id') === $city->id) selected @endif>
                                {{ $city->name }}</option>
                        @endforeach
                    </select>
                    <span>{{ $errors->first('city_id') }}</span>

                    <label @if ($errors->has('password')) class="input-danger" @endif for="19">Пароль</label>
                    <input class="input textarea" type="password" id="19" name="password" autocomplete="off"
                        value="{{ old('password') }}" />
                    <span>{{ $errors->first('password') }}</span>

                    <label @if (in_array('Пароли должны совпадать', $errors->get('password'))) class="input-danger" @endif for="20">
                        Подтвердите пароль
                    </label>
                    <input class="input textarea" type="password" id="20" name="password_confirmation"
                        autocomplete="off">
                    @if (in_array('Пароли должны совпадать', $errors->get('password')))
                        <span>{{ $errors->first('password') }}</span>
                    @endif

                    <input type="hidden" name="notification_settings" value="{{ json_encode(['1', '2', '3']) }}" />
                    <button class="button button__registration" type="submit">Cоздать аккаунт</button>
                </form>
            </div>
        </section>
    </div>
@endsection
