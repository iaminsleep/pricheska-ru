@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Главная</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Список статей</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
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
                                        <td>{{ $loop->index + 1 }}</td>
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
                    <p>Статей пока нет...</p>
                @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{ $tasks->links() }}
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection
