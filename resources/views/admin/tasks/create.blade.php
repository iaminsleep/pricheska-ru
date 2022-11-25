@extends('admin.layouts.layout')

@section('title', 'Новое задание')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Заполните форму</h3>
                </div>
                <form action="{{ route('admin.tasks.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">
                                Заголовок
                            </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" placeholder="Введите название" required value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="5"
                                placeholder="Вступление к статье" id="description" name="description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                name="category_id" required>
                                <option value="">Выбор категории</option>
                                @foreach ($categories as $key => $value)
                                    <option value="{{ $key }}" @if (old('category_id') && intval(old('category_id')) === $key) selected @endif>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">Тэги</label>
                            <select name="tags[]" id="tags" class="select2" multiple="multiple"
                                data-placeholder="Выберите тэги" style="width: 100%;">
                                @foreach ($tags as $key => $value)
                                    <option value="{{ $key }}" @if (old('tags') && in_array($key, old('tags'))) selected @endif>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="budget">Бюджет</label>
                            <input class="form-control @error('budget') is-invalid @enderror" value="{{ old('budget') }}"
                                placeholder="Укажите, сколько вы готовы заплатить" id="budget" name="budget" />
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес</label>
                            <input class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"
                                placeholder="Калининский район, 22" id="address" name="address" />
                        </div>
                        <div class="form-group">
                            <label for="deadline">Срок исполнения</label>
                            <input class="form-control @error('deadline') is-invalid @enderror" type="date"
                                value="{{ old('deadline') }}" id="deadline" name="deadline" />
                        </div>
                        <div class="form-group">
                            <label for="image">Изображение</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                        id="image" name="image">
                                    <label class="custom-file-label" for="image">Выберите файл</label>
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
