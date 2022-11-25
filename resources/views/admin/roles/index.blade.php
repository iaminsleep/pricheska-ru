@extends('admin.layouts.layout')

@section('title', 'Список ролей')

@section('content')
    <section class="content">
        <div class="card">
            @include('admin.layouts.card-header')
            <div class="card-body">
                <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">
                    Добавить роль
                </a>
                @if ($roles->count())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Наименование</th>
                                    <th>Кодовое имя</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->codename }}</td>
                                        <td>
                                            <a href="{{ route('roles.edit', ['role' => $role->id]) }}"
                                                class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('roles.destroy', ['role' => $role->id]) }}"
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
                    <p>Ролей пока нет...</p>
                @endif
            </div>
            <div class="card-footer">
                {{ $roles->links() }}
            </div>
        </div>
    </section>
@endsection
