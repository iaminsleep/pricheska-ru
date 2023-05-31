@extends('front.tasks.layout')

@section('title', 'Страница пользователя ' . $user->name)

@section('main-class', 'page-main')

@section('page-content')
    <div class="main-container page-container">
        <section class="content-view" style="border-radius: 10px">
            @include('front.tasks.profile.section-user-card')
            @if ($user->isHairdresser())
                <div class="content-view__feedback">
                    <h2>Услуги
                    </h2>
                    <div class="content-view__feedback-wrapper reviews-wrapper">
                        @forelse($services as $service)
                            <div class="feedback-card__reviews">
                                <div class="card__review">
                                    <p>
                                        <img src="{{ $service->getImage() }}" width="55" height="55">
                                    </p>
                                    <div class="feedback-card__reviews-content">
                                        <p class="link-name link">
                                        <p class="link-regular">
                                            {{ $service->name }}
                                        </p>
                                        </p>
                                        <div style="display: flex; gap: 50px; padding-bottom: 10px;">
                                            <div>
                                                <p class="review-text" style="width: 470px">
                                                    {{ $service->description }}
                                                </p>
                                                <b class="new-task__price new-task__price--translation">{{ $service->price }}<b>
                                                        ₽</b></b>
                                            </div>
                                            @auth
                                                @if (!auth()->user()->isHairdresser() && auth()->user()->id !== $user->id)
                                                    <button class="request-button button openServiceModal"
                                                        data-id="{{ $service->id }}"
                                                        style="padding: 10px 20px; align-self: center;">Заказать</button>
                                                @elseif(auth()->user()->isHairdresser() && auth()->user()->id === $user->id)
                                                    <div>
                                                        <a style="margin-bottom: 5px; text-decoration:none; color: green;font-size: 15px;"
                                                            href="{{ route('service.edit', ['id' => $service->id]) }}"><i
                                                                class='fa fa-edit'></i>
                                                            Редактировать
                                                        </a>
                                                        <form action="{{ route('service.delete', ['id' => $service->id]) }}"
                                                            method="post" onsubmit="return confirm('Вы уверены?')"
                                                            style="text-decoration:none; color: #bb0e0e">
                                                            <i class='fa fa-trash' style="padding-right: 3px;"></i>
                                                            <button type="submit"
                                                                style="background: none; color: inherit; border: none; padding: 0; font: inherit;cursor: pointer; outline: inherit;">Удалить</button>
                                                            @method('DELETE')
                                                            @csrf
                                                        </form>
                                                    </div>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>У данного пользователя нету услуг.</p>
                        @endforelse
                    </div>
                </div>
            @endif
            @include('front.tasks.profile.section-feedbacks')
        </section>
    </div>
    @auth
        <section class="modal enter-form form-modal" id="modal" style="top: 300px; left: 60%">
            <h2>Заполните данные</h2>
            <form method="post" action="" id="service-order-form">
                @csrf
                <p>
                    <label
                        class="form-modal-description
                @if ($errors->has('deadline')) {{ 'input-danger' }} @endif"
                        for="enter-email">
                        Дата встречи
                    </label>
                    <input
                        class="enter-form-email input input-middle input-date @if ($errors->has('deadline')) {{ 'login-danger' }} @endif"
                        type="date" name="deadline" style="background-image: none" id="enter-deadline"
                        value="{{ old('deadline') }}">
                    @error('deadline')
                        <span class="fs-12"> {{ $errors->first('deadline') }} </span>
                    @enderror
                </p>
                <p>
                    <label
                        class="form-modal-description
                @if ($errors->has('address')) {{ 'input-danger' }} @endif"
                        for="enter-password">
                        Адрес
                    </label>
                    <input
                        class="enter-form-email input input-middle input-navigation @if ($errors->has('address')) {{ 'login-danger' }} @endif"
                        name="address" id="enter-address" autocomplete="on" value="{{ old('address') }}">
                    @error('address')
                        <span class="fs-12">{{ $errors->first('address') }}</span>
                    @enderror
                </p>
                <button class="button" type="submit">Заказать</button>
            </form>
            <button class="form-modal-close" type="button" id="closeModal">Закрыть</button>
        </section>
        <script defer>
            window.onload = function() {
                var overlay = document.getElementsByClassName("overlay")[0];
                var openServiceModalButtons = document.getElementsByClassName("openServiceModal");

                for (var i = 0; i < openServiceModalButtons.length; i++) {
                    var openModalBtn = openServiceModalButtons[i];

                    openModalBtn.addEventListener("click", function(event) {
                        // показываем модальное окно
                        let id = event.target.getAttribute("data-id");
                        document.getElementById("modal").style.display = "block";
                        document.getElementById("service-order-form").action = "/service/" + id;
                        overlay.setAttribute("style", "display: block");
                    });
                }

                // закрыть модальное окно
                document.getElementById("closeModal").addEventListener("click", function() {
                    // очищаем поля в модальном окне
                    document.getElementById("enter-deadline").value = "";
                    document.getElementById("enter-address").value = "";
                    // скрываем модальное окно
                    document.getElementById("modal").style.display = "none";
                    document.getElementById("service-order-form").action = "";
                    overlay.setAttribute("style", "display: none");
                });
            }
        </script>
    @endauth
@endsection
