@extends('admin.layouts.layout')

@section('title', 'Редактирование тэга')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Заполните форму</h3>
                </div>
                <form action="{{ route('tags.update', ['tag' => $tag->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">
                                Название
                            </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                value="{{ $tag->title }}" name="title" placeholder="Введите название">
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
