@extends('admin.layouts.layout')

@section('title', 'Статистика')

@section('scripts')

@endsection

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            @include('admin.layouts.card-header')
            <div class="card-body statistics-container">
                <a href="{{ route('admin.users.index') }}">
                    <div class="tile">
                        <i class="fa fa-users" style="font-size:54px;"></i>
                        <p class="statisctics-text">Всего пользователей: {{ $users_count }}</p>
                    </div>
                </a>
                <a href="{{ route('admin.tasks.index') }}">
                    <div class="tile">
                        <i class="fas fa-book" style="font-size:54px;"></i>
                        <p class="statisctics-text">Количество созданных заданий: {{ $tasks_count }}</p>
                    </div>
                </a>
                <a href="{{ route('services.index') }}">
                    <div class="tile">
                        <i class="fas fa-book" style="font-size:54px;"></i>
                        <p class="statisctics-text">Количество услуг:
                            {{ Illuminate\Support\Facades\DB::table('services')->count() }}</p>
                    </div>
                </a>
                <a href="{{ route('admin.posts.index') }}">
                    <div class="tile">
                        <i class="fas fa-edit" style="font-size:54px;"></i>
                        <p class="statisctics-text">Количество постов в блоге: {{ $posts_count }}</p>
                    </div>
                </a>
                <a href="{{ route('comments.index') }}">
                    <div class="tile">
                        <i class="fa fa-comment" style="font-size:54px;"></i>
                        <p class="statisctics-text">Оставлено комментариев: {{ $comments_count }}</p>
                    </div>
                </a>
                <a href="{{ route('responses.index') }}">
                    <div class="tile">
                        <i class="fa fa-reply" style="font-size:54px;"></i>
                        <p class="statisctics-text">Отправлено откликов к заданиям:
                            {{ Illuminate\Support\Facades\DB::table('responses')->count() }}</p>
                    </div>
                </a>
                <a href="{{ route('feedbacks.index') }}">
                    <div class="tile">
                        <i class="fas fa-star" style="font-size:54px;"></i>
                        <p class="statisctics-text">Оставлено отзывов мастерам:
                            {{ Illuminate\Support\Facades\DB::table('feedbacks')->count() }}</p>
                    </div>
                </a>
                <a href="{{ route('categories.index') }}">
                    <div class="tile">
                        <i class="fas fa-archive" style="font-size:54px;"></i>
                        <p class="statisctics-text">Категорий в системе:
                            {{ Illuminate\Support\Facades\DB::table('categories')->count() }}</p>
                    </div>
                </a>
                <a href="{{ route('tags.index') }}">
                    <div class="tile">
                        <i class="fa fa-hashtag" style="font-size:54px;"></i>
                        <p class="statisctics-text">Всего тэгов создано:
                            {{ Illuminate\Support\Facades\DB::table('tags')->count() }}</p>
                    </div>
                </a>
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
