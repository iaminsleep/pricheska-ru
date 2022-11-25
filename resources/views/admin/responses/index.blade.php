@extends('admin.layouts.layout')

@section('title', 'Список откликов')

@section('content')
    <section class="content">
        <div class="card">
            @include('admin.layouts.card-header')
            <div class="card-body">
                <a href="{{ route('responses.create') }}" class="btn btn-primary mb-3">
                    Добавить ответ
                </a>
                @if ($responses->count())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Автор</th>
                                    <th>Задание</th>
                                    <th>Комментарий</th>
                                    <th>Цена</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($responses as $response)
                                    <tr>
                                        <td>{{ $response->id }}</td>
                                        <td>{{ $response->user->name }}</td>
                                        <td>{{ $response->task->title }}</td>
                                        <td>{{ $response->comment }}</td>
                                        <td>{{ $response->payment }}</td>
                                        <td>
                                            <a href="{{ route('tasks.single', ['id' => $response->task->id]) }}"
                                                class="btn btn-warning btn-sm float-left mr-1" target="_blank">
                                                <i class="fas fa-share"></i>
                                            </a>
                                            <a href="{{ route('responses.edit', ['response' => $response->id]) }}"
                                                class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('responses.destroy', ['response' => $response->id]) }}"
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
                    <p>Ответов к заданиям пока нет...</p>
                @endif
            </div>
            <div class="card-footer">
                {{ $responses->links() }}
            </div>
        </div>
    </section>
@endsection
