@extends('front.tasks.layout')

@section('title', 'Мой аккаунт')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        <section class="account__redaction-wrapper">
            <h1>Редактирование настроек профиля</h1>
            <form action="{{ route('account.store') }}" enctype="multipart/form-data" method="post">
                @method('PUT')
                @csrf
                <div class="account__redaction-section">
                    @include('front.tasks.account.account-settings')
                    {{-- @include('front.tasks.account.specialization-settings') --}}
                    @include('front.tasks.account.security-settings')
                    {{-- @include('front.tasks.account.contacts-settings') --}}
                </div>
                <button class="button" type="submit">Сохранить изменения</button>
            </form>
        </section>
    </div>
@endsection
