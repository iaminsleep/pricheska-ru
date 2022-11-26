@extends('admin.layouts.layout')

@section('title', 'Редактирование отзыва')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Заполните форму</h3>
                </div>
                <form action="{{ route('feedbacks.update', ['feedback' => $feedback->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="rating">
                                Рейтинг
                            </label>
                            <select class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating"
                                required>
                                <option value="">Выберите рейтинг</option>
                                <option value="1" @if ($feedback->rating && intval($feedback->rating) === 1) selected @endif>1</option>
                                <option value="2" @if ($feedback->rating && intval($feedback->rating) === 2) selected @endif>2</option>
                                <option value="3" @if ($feedback->rating && intval($feedback->rating) === 3) selected @endif>3</option>
                                <option value="4" @if ($feedback->rating && intval($feedback->rating) === 4) selected @endif>4</option>
                                <option value="5" @if ($feedback->rating && intval($feedback->rating) === 5) selected @endif>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comment">
                                Комментарий
                            </label>
                            <input type="text" class="form-control @error('comment') is-invalid @enderror" id="comment"
                                name="comment" placeholder="Объясните свою оценку" value="{{ $feedback->comment }}">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
