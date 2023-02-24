@extends('layout')

@section('title', 'Результаты поиска')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container relative-container">
        <a class="dec-none" href="{{ route('users.page') }}">
            <button class="button absolute-button">
                << Назад</button>
        </a>
        @include('search-user.section-users')
    </div>
@endsection
