@extends('admin.layouts.layout')

@section('title', 'Редактирование отклика на задание')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Заполните форму</h3>
                </div>
                <form action="{{ route('responses.update', ['response' => $response->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="comment">
                                Комментарий
                            </label>
                            <input class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment"
                                placeholder="Введите комментарий" value="{{ $response->comment }}">
                        </div>
                        <div class="form-group">
                            <label for="payment">
                                Оплата
                            </label>
                            <input type="number" class="form-control @error('payment') is-invalid @enderror" id="payment"
                                name="payment" placeholder="Введите желаемую оплату за работу, &#8381;"
                                value="{{ $response->payment }}">
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
