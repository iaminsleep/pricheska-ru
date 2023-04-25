@extends('front.tasks.layout')

@section('title', 'Отредактировать услугу')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection

@section('main-class', 'page-main')

@section('scripts')
    <script src="{{ asset('public/assets/front/tasks/js/admin.js') }}"></script>
@endsection

@section('page-content')
    <div class="main-container page-container">
        <section class="create__task">
            <h1>Редактирование услуги</h1>
            <div class="create__task-main">
                <form class="create__task-form form-create" method="post"
                    action="{{ route('service.update', ['id' => $service->id]) }}" enctype="multipart/form-data"
                    id="task-form">
                    <label for="10">Название услуги</label>
                    <input class="input textarea" rows="1" id="10" name="name"
                        placeholder="Стрижка под ноль" value="{{ $service->name }}" />
                    <span>Название вашей услуги</span>
                    <label for="11">Подробности услуги</label>
                    <input class="input textarea" rows="7" id="11" name="description" placeholder=""
                        value="{{ $service->description }}" />
                    <span>Укажите всё, что необходимо знать клиенту</span>
                    <label for="12">Категория</label>
                    <select class="multiple-select input multiple-select-big" id="12" size="1"
                        name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($service->category_id === $category->id) selected @endif>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    <span>Выберите категорию</span>

                    <div class="create__price-time">
                        <div class="create__price-time--wrapper">
                            <label for="14">Цена</label>
                            <input class="input textarea input-money" rows="1" id="14" name="price"
                                placeholder="1000" value="{{ $service->price }}" />
                            <span>Укажите, сколько стоит ваша услуга</span>
                        </div>
                    </div>
                    <label for="16">Превью</label>
                    <input id="16" class="" type="file" name="image" value="{{ $service->image }}" />
                    <span style="margin-top:10px; margin-bottom: 20px;">Выберите изображение</span>
                    @csrf
                    @method('PUT')
                </form>
                <div class="create__warnings">
                    @if ($errors->any())
                        @include('front.tasks.create.partials.create-errors')
                    @endif
                </div>
            </div>
            <button form="task-form" class="button" type="submit">Обновить</button>
        </section>
    </div>
@endsection
