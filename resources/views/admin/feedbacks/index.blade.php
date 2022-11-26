@extends('admin.layouts.layout')

@section('title', 'Список отзывов пользователей')

@section('content')
    <section class="content">
        <div class="card">
            @include('admin.layouts.card-header')
            <div class="card-body">
                <a href="{{ route('feedbacks.create') }}" class="btn btn-primary mb-3">
                    Добавить отзыв
                </a>
                @if ($feedbacks->count())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: 270px">Задание</th>
                                    <th>Автор</th>
                                    <th>Получатель</th>
                                    <th style="width: 600px">Комментарий</th>
                                    <th>Рейтинг</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedbacks as $feedback)
                                    <tr>
                                        <td>{{ $feedback->id }}</td>
                                        <td>{{ $feedback->task->title }}</td>
                                        <td>{{ $feedback->author->name }}</td>
                                        <td>{{ $feedback->receiver->name }}</td>
                                        <td>{{ $feedback->comment }}</td>
                                        <td>{{ $feedback->rating }}</td>
                                        <td>
                                            <a href="{{ route('users.single', ['id' => $feedback->author->id]) }}"
                                                class="btn btn-warning btn-sm float-left mr-1" target="_blank">
                                                <i class="fas fa-share"></i>
                                            </a>
                                            <a href="{{ route('feedbacks.edit', ['feedback' => $feedback->id]) }}"
                                                class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('feedbacks.destroy', ['feedback' => $feedback->id]) }}"
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
                    <p>Отзывов пока нет...</p>
                @endif
            </div>
            <div class="card-footer">
                {{ $feedbacks->links() }}
            </div>
        </div>
    </section>
@endsection
