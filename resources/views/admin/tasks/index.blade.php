@extends('admin.layouts.layout')

@section('title', 'Список заказов')

@section('content')
    <section class="content">
        <div class="card">
            @include('admin.layouts.card-header')
            <div class="card-body">
                <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary mb-3">
                    Добавить задание
                </a>
                @if ($tasks->count())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: 400px">Заголовок</th>
                                    <th>Категория</th>
                                    <th>Тэги</th>
                                    <th>Адрес</th>
                                    <th>Бюджет</th>
                                    <th>Крайний срок</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->category->title }}</td>
                                        <td>{{ $task->tags->pluck('title')->map(function ($title) {
                                                return '#' . $title;
                                            })->join(', ') }}
                                        </td>
                                        <td>{{ $task->address }}</td>
                                        <td>{{ $task->budget }}
                                        </td>
                                        <td>{{ $task->deadline }}</td>
                                        <td>
                                            <a href="{{ route('tasks.single', ['id' => $task->id]) }}"
                                                class="btn btn-warning btn-sm float-left mr-1" target="_blank">
                                                <i class="fas fa-share"></i>
                                            </a>
                                            <a href="{{ route('admin.tasks.edit', ['task' => $task->id]) }}"
                                                class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('admin.tasks.destroy', ['task' => $task->id]) }}"
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
                    <p>Заказов пока нет...</p>
                @endif
            </div>
            <div class="card-footer">
                {{ $tasks->links() }}
            </div>
        </div>
    </section>
@endsection
