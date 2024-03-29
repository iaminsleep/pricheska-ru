@extends('front.tasks.layout')

@section('title', 'Опубликовать задание')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection

@section('main-class', 'page-main')

@section('scripts')
    {{-- Dropzone Script Import --}}
    {{-- <script src="/js/dropzone.js"></script> --}}
    {{-- Dropzone Settings --}}
    {{-- @include('front.tasks.create.dropzone') --}}
    <script src="{{ asset('public/assets/front/tasks/js/admin.js') }}"></script>
@endsection

@section('page-content')
    <div class="main-container page-container">
        <section class="create__task" style="border-radius: 10px">
            <h1>Публикация нового заказа</h1>
            <div class="create__task-main">
                @include('front.tasks.create.section-create-form')
                @include('front.tasks.create.section-warnings')
            </div>
            <button form="task-form" class="button" type="submit">Опубликовать</button>
        </section>
    </div>
@endsection
