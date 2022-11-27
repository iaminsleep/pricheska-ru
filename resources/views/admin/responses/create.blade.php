@extends('admin.layouts.layout')

@section('title', 'Создание отклика на задание')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Заполните форму</h3>
                </div>
                <form action="{{ route('responses.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="task_id">
                                ID Задания
                            </label>
                            <input type="number" class="form-control @error('task_id') is-invalid @enderror" id="task_id"
                                name="task_id" placeholder="Введите ID заказа" value="{{ old('task_id') }}">
                        </div>
                        <div class="form-group">
                            <label for="comment">
                                Комментарий
                            </label>
                            <input type="text" class="form-control @error('comment') is-invalid @enderror" id="comment"
                                name="comment" placeholder="Введите комментарий" value="{{ old('comment') }}">
                        </div>
                        <div class="form-group">
                            <label for="payment">
                                Оплата
                            </label>
                            <input type="number" class="form-control @error('payment') is-invalid @enderror" id="payment"
                                name="payment" placeholder="Введите желаемую оплату за работу, в рублях"
                                value="{{ old('payment') }}">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
