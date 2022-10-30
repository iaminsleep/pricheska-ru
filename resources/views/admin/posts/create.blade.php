@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новая статья</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Заполните форму</h3>
                </div>
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">
                                Название
                            </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" placeholder="Введите название" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="3"
                                placeholder="Вступление к статье" id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Контент</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" rows="6" placeholder="Контент"
                                id="content" name="content" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                name="category_id" required>
                                <option value="">Выбор категории</option>
                                @foreach ($categories as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">Тэги</label>
                            <select name="tags[]" id="tags" class="select2" multiple="multiple"
                                data-placeholder="Выберите тэги" style="width: 100%;">
                                @foreach ($tags as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Изображение</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('thumbnail') is-invalid @enderror"
                                        id="thumbnail" name="thumbnail">
                                    <label class="custom-file-label" for="thumbnail">Выберите файл</label>
                                </div>
                            </div>
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
