@extends('admin.layouts.layout')

@section('title', 'Главная')

@section('scripts')

@endsection

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            @include('admin.layouts.card-header')
            <div class="card-body statistics-container">
                <div class="tile">
                    <i class="fa fa-users" style="font-size:54px;"></i>
                    <p class="statisctics-text">Количество пользователей на сайте: {{ $users_count }}</p>
                </div>
                <div class="tile">
                    <i class="fas fa-book" style="font-size:54px;"></i>
                    <p class="statisctics-text">Количество созданных заданий: {{ $tasks_count }}</p>
                </div>
                <div class="tile">
                    <i class="fas fa-edit" style="font-size:54px;"></i>
                    <p class="statisctics-text">Количество постов в блоге: {{ $posts_count }}</p>
                </div>
                <div class="tile">
                    <i class="fa fa-comment" style="font-size:54px;"></i>
                    <p class="statisctics-text">Количество комментариев: {{ $comments_count }}</p>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
