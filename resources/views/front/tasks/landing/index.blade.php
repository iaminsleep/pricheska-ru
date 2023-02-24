@extends('layout')

@section('title', 'Главная')

@section('body-class', 'landing')

@section('page-content')
    <div class="landing-container">
        @include('landing.landing-top')
        @include('landing.landing-center')
        @include('landing.landing-notice')
        @include('landing.landing-bottom')
    </div>
@endsection
