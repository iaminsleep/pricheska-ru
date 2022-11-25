@extends('admin.layouts.layout')

@section('title', 'Список статей')

@section('content')
    <section class="content">
        <div class="card">
            @include('admin.layouts.card-header')
            <div class="card-body">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">
                    Добавить статью
                </a>
                @if ($posts->count())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Наименование</th>
                                    <th>Категория</th>
                                    <th>Тэги</th>
                                    <th>Дата создания</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->title }}</td>
                                        <td>{{ $post->tags->pluck('title')->map(function ($title) {
                                                return '#' . $title;
                                            })->join(', ') }}
                                        </td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>
                                            <a href="{{ route('posts.single', ['slug' => $post->slug]) }}"
                                                class="btn btn-warning btn-sm float-left mr-1" target="_blank">
                                                <i class="fas fa-share"></i>
                                            </a>
                                            <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}"
                                                class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}"
                                                method="post" class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Статей пока нет...</p>
                @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{ $posts->links() }}
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection
