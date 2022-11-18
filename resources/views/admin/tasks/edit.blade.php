@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование задания</h1>
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
                <form action="{{ route('admin.tasks.update', ['task' => $task->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">
                                Заголовок
                            </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" placeholder="Введите название" required value="{{ $task->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="5"
                                placeholder="Вступление к статье" id="description" name="description">{{ $task->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                name="category_id" required>
                                <option value="">Выбор категории</option>
                                @foreach ($categories as $key => $value)
                                    <option value="{{ $key }}" @if ($task->category_id && intval($task->category_id) === $key) selected @endif>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">Тэги</label>
                            <select name="tags[]" id="tags" class="select2" multiple="multiple"
                                data-placeholder="Выберите тэги" style="width: 100%;">
                                @foreach ($tags as $key => $value)
                                    <option value="{{ $key }}" @if (in_array($key, $task->tags->pluck('id')->all())) selected @endif>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="budget">Бюджет</label>
                            <input class="form-control @error('budget') is-invalid @enderror" value="{{ $task->budget }}"
                                placeholder="Укажите, сколько вы готовы заплатить" id="budget" name="budget" />
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес</label>
                            <input class="form-control @error('address') is-invalid @enderror" value="{{ $task->address }}"
                                placeholder="Калининский район, 22" id="address" name="address" />
                        </div>
                        <div class="form-group">
                            <label for="deadline">Срок исполнения</label>
                            <input class="form-control @error('deadline') is-invalid @enderror" type="date"
                                value="{{ $task->deadline }}" id="deadline" name="deadline" />
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
                            <div>
                                <img class="img-thumbnail mt-4" src="{{ $task->getImage() }}" />
                            </div>
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
