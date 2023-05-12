@extends('admin.layouts.layout')

@section('title', 'Список услуг')

@section('content')
    <section class="content">
        <div class="card">
            @include('admin.layouts.card-header')
            <div class="card-body">
                @if ($services->count())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Автор</th>
                                    <th>Заголовок</th>
                                    <th>Категория</th>
                                    <th>Описание</th>
                                    <th>Цена</th>
                                    <th>Дата создания</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->user->name }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->category->title }}</td>
                                        <td>{{ $service->description }}</td>
                                        <td>{{ $service->price }}</td>
                                        <td>{{ $service->created_at }}</td>
                                        <td>
                                            <a href="{{ route('users.single', ['id' => $service->user->id]) }}"
                                                class="btn btn-warning btn-sm float-left mr-1" target="_blank">
                                                <i class="fas fa-share"></i>
                                            </a>
                                            <form action="{{ route('services.destroy', ['service' => $service->id]) }}"
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
                {{ $services->links() }}
            </div>
        </div>
    </section>
@endsection
