@extends('admin.layouts.layout')

@section('title', 'Список пользователей')

@section('content')
    <section class="content">
        <div class="card">
            @include('admin.layouts.card-header')
            <div class="card-body">
                <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
                    Добавить пользователя
                </a>
                @if ($users->count())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Имя пользователя</th>
                                    <th>Почта</th>
                                    <th>Роль</th>
                                    <th>Дата регистрации</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles->pluck('name')->map(function ($name) {
                                                return $name;
                                            })->join(', ') }}
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{ route('users.single', ['id' => $user->id]) }}"
                                                class="btn btn-warning btn-sm float-left mr-1" target="_blank">
                                                <i class="fas fa-share"></i>
                                            </a>
                                            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
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
                    <p>Пользователей пока нет...</p>
                @endif
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        </div>
    </section>
@endsection
