@extends('admin.layouts.layout')

@section('title', 'Редактирование категории')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Заполните форму</h3>
                </div>
                <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">
                                Название
                            </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                value="{{ $category->title }}" name="title" placeholder="Введите название">
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
