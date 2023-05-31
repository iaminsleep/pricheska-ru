@extends('front.tasks.layout')

@section('title', 'Результаты поиска')

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container relative-container" style="border-radius: 10px">
        <a class="dec-none" href="{{ route('tasks.index') }}">
            <button class="button absolute-button">
                << Назад</button>
        </a>
        @include('front.tasks.search-task.section-tasks')
    </div>
@endsection
