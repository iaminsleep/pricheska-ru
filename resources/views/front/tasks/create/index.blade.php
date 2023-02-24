@extends('layout')

@section('title', 'Опубликовать задание')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection

@section('main-class', 'page-main')

@section('scripts')
    {{-- Dropzone Script Import --}}
    <script src="/js/dropzone.js"></script>
    {{-- Dropzone Settings --}}
    @include('create.dropzone')
@endsection

@section('page-content')
    <div class="main-container page-container">
        <section class="create__task">
            <h1>Публикация нового задания</h1>
            <div class="create__task-main">
                @include('create.section-create-form')
                @include('create.section-warnings')
            </div>
            <button form="task-form" class="button" type="submit">Опубликовать</button>
        </section>
    </div>
@endsection
