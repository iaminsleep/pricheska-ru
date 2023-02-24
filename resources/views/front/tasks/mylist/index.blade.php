@extends('layout')

@section('title', 'Мои задания')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        @include('mylist.section-menu-toggle')
        @include('mylist.section-tasks')
    </div>
@endsection
