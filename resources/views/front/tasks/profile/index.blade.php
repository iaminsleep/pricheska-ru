@extends('layout')

@section('title', 'Страница пользователя '.$user->name)

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        <section class="content-view">
            @include('profile.section-user-card')
            @include('profile.section-feedbacks')
        </section>
    </div>
@endsection
