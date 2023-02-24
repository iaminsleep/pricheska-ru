@extends('layout')

@section('title', 'Исполнители')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        @include('performers.section-users')
        @include('performers.section-search-filters')
    </div>
@endsection
