@extends('admin.layouts.layout')

@section('title', 'Список парикмахеров')

@section('content')
    <section class="content">
        <div class="card">
            @include('admin.layouts.card-header')
            <div class="card-body">
                <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
                    Добавить пользователя
                </a>
                @if ($hairdressers->count())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Имя пользователя</th>
                                    <th>Почта</th>
                                    <th>Рейтинг</th>
                                    <th style="width: 200px">Кол-во выполненных заданий</th>
                                    <th style="width: 140px">Средняя плата за услуги</th>
                                    <th style="width: 215px">Кол-во дней с последнего выполнения задания</th>
                                    <th style="width: 180px">Частота выполнения заданий</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hairdressers as $hairdresser)
                                    <tr>
                                        <td>{{ $hairdresser->id }}</td>
                                        <td>{{ $hairdresser->name }}</td>
                                        <td>{{ $hairdresser->email }}</td>
                                        <td>{{ $hairdresser->averageRating() }}</td>
                                        <td>{{ $hairdresser->tasksCount('completed') }}</td>
                                        <td>{{ $hairdresser->averagePayment() }} &#8381;</td>
                                        <td>{{ $hairdresser->daysSinceLastTaskCompletion() }}</td>
                                        <td>{{ $hairdresser->frequencyOfTaskCompletions() / 24 }} заданий/сутки</td>
                                        <td>
                                            <a href="{{ route('users.single', ['id' => $hairdresser->id]) }}"
                                                class="btn btn-warning btn-sm float-left mr-1" target="_blank">
                                                <i class="fas fa-share"></i>
                                            </a>
                                            <a href="{{ route('users.edit', ['user' => $hairdresser->id]) }}"
                                                class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('users.destroy', ['user' => $hairdresser->id]) }}"
                                                method="post" class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление пользователя')">
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
                    <p>Пользователей, зарегистрированных как парикмахер пока нет...</p>
                @endif
            </div>
            <div class="card-footer">
                {{ $hairdressers->links() }}
            </div>
        </div>
    </section>
@endsection