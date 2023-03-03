@extends('front.tasks.layout')

@section('title', 'Мои задания')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        @include('front.tasks.mylist.section-menu-toggle')
        @include('front.tasks.mylist.section-tasks')
    </div>
@endsection
