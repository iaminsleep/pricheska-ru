@extends('front.tasks.layout')

@section('title', 'Опубликовать услугу')

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
            <h1>Создание услуги</h1>
            <div class="create__task-main">
                <form class="create__task-form form-create" method="post" action="{{ route('service.store') }}"
                    enctype="multipart/form-data" id="task-form">
                    <label for="10">Название услуги</label>
                    <input class="input textarea" rows="1" id="10" name="name"
                        placeholder="Стрижка под ноль" value="{{ old('name') }}" />
                    <span>Название вашей услуги</span>
                    <label for="11">Подробности услуги</label>
                    <input class="input textarea" rows="7" id="11" name="description" placeholder=""
                        value="{{ old('description') }}" />
                    <span>Укажите всё, что необходимо знать клиенту</span>
                    @include('front.tasks.create.partials.task-category')
                    <div class="create__price-time">
                        <div class="create__price-time--wrapper">
                            <label for="14">Цена</label>
                            <input class="input textarea input-money" rows="1" id="14" name="price"
                                placeholder="1000" value="{{ old('price') }}" />
                            <span>Укажите, сколько стоит ваша услуга</span>
                        </div>
                    </div>
                    <label for="16">Превью</label>
                    <input id="16" class="" type="file" name="image" value="{{ old('image') }}" />
                    <span style="margin-top:10px; margin-bottom: 20px;">Выберите изображение</span>
                    @csrf
                </form>
                <div class="create__warnings">
                    <div class="warning-item warning-item--advice">
                        <h2>Правила хорошего описания</h2>
                        <h3>Подробности</h3>
                        <p>На это странице вы можете создать услугу<br>
                            для вашего прайс-листа. Описывайте <br>
                            услугу как можно подробнее, чтобы между <br>
                            вами и клиентом не возникло недоразумений.</p>
                        <h3>Фотографии</h3>
                        <p>Если загружаете фотографии объекта, <br> то убедитесь,
                            что всё в фокусе, а фото <br> показывает объект со всех
                            ракурсов.</p>
                    </div>

                    @if ($errors->any())
                        @include('front.tasks.create.partials.create-errors')
                    @endif
                </div>
            </div>
            <button form="task-form" class="button" type="submit">Опубликовать</button>
        </section>
    </div>
@endsection
