@extends('layout')

@section('title', 'Мой аккаунт')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        <section class="account__redaction-wrapper">
            <h1>Редактирование настроек профиля</h1>
            <form action="{{ route('account.change') }}" enctype="multipart/form-data" method="post">
                @method('PUT')
                @csrf
                <div class="account__redaction-section">
                    @include('account.account-settings')
                    @include('account.specialization-settings')
                    @include('account.security-settings')
                    @include('account.contacts-settings')
                    @include('account.notifications-settings')
                </div>
                <button class="button" type="submit">Сохранить изменения</button>
            </form>
        </section>
    </div>
@endsection
