@extends('front.tasks.layout')

@section('title', 'Заказы')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        @include('front.tasks.browse.section-ranked')
        @include('front.tasks.browse.section-tasks')
        @include('front.tasks.browse.section-search-filters')
    </div>
@endsection
