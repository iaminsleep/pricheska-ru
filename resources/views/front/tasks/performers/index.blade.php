@extends('front.tasks.layout')

@section('title', 'Исполнители')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        @include('front.tasks.performers.section-users')
        @include('front.tasks.performers.section-search-filters')
    </div>
@endsection
