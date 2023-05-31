<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @yield('head')
    <link href="{{ asset('public/assets/front/tasks/css/front.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/front/tasks/css/media.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('public/assets/front/tasks/img/barber-shop.png') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js"></script>
    <script src="https://kit.fontawesome.com/77ae30b638.js" crossorigin="anonymous"></script>
</head>

<body class="@yield('body-class')">
    <div class="table-layout" style="background-color:#EDE9E6">
        <x-header></x-header>
        <main class="@yield('main-class')" style="background-color: #EDE9E6; padding-top: 30px;">
            @yield('page-content')
        </main>
        @guest
            @include('front.tasks.login.index')
        @endguest
        <x-footer></x-footer>
        <div class="overlay"></div>
    </div>
</body>
@yield('scripts')

</html>
