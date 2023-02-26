<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @yield('head')
    <link href="{{ asset('public/assets/front/tasks/css/front.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js"></script>
    <script src="public/js/main.js" defer></script>
</head>

<body class="@yield('body-class')">
    <div class="table-layout">
        <x-header></x-header>
        <main class="@yield('main-class')">
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
