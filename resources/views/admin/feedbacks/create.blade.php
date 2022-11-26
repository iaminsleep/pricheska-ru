@extends('admin.layouts.layout')

@section('title', 'Создание отзыва')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Заполните форму</h3>
                </div>
                <form action="{{ route('feedbacks.store') }}" method="post">
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
                            <label for="receiver_id">
                                ID Получателя
                            </label>
                            <input type="number" class="form-control @error('receiver_id') is-invalid @enderror"
                                id="receiver_id" name="receiver_id"
                                placeholder="Введите ID парикмахера, который получит отзыв"
                                value="{{ old('receiver_id') }}">
                        </div>
                        <div class="form-group">
                            <label for="rating">
                                Рейтинг
                            </label>
                            <select class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating"
                                required>
                                <option value="">Выберите рейтинг</option>
                                <option value="1" @if (old('rating') && intval(old('rating')) === 1) selected @endif>1</option>
                                <option value="2" @if (old('rating') && intval(old('rating')) === 2) selected @endif>2</option>
                                <option value="3" @if (old('rating') && intval(old('rating')) === 3) selected @endif>3</option>
                                <option value="4" @if (old('rating') && intval(old('rating')) === 4) selected @endif>4</option>
                                <option value="5" @if (old('rating') && intval(old('rating')) === 5) selected @endif>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comment">
                                Комментарий
                            </label>
                            <input type="text" class="form-control @error('comment') is-invalid @enderror" id="comment"
                                name="comment" placeholder="Объясните свою оценку" value="{{ old('comment') }}">
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
