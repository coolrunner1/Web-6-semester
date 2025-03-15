<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <x-title/>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body id="main-page">
        <x-navbar/>
        <div class="content-container">
            <div id="top">
                <div class="top-div">
                    <div class="hero">Меня зовут Козловцев Игорь</div>
                    <div class="hero-secondary">Я студент группы ИС/б-22-1-о</div>
                    <div class="hero-secondary">ЛАБОРАТОРНАЯ РАБОТА №8 - Исследование архитектуры MVC приложения и возможностей обработки данных HTML-форм на стороне сервера с использованием языка PHP</div>
                </div>
                <img src="{{url('storage/home/phplogo.jpg')}}" title="PHP" alt="php" width="600" height="330">
            </div>
            <div id="container-with-box">
                <div class="content-box">
                    <div>
                        <div class="hero-header">Есть предложения по улучшению сайта?</div>
                        <div class="hero-secondary">Заполните данную форму!</div>
                    </div>
                    <a href="{{ url('/contact') }}"><button id="but2">Заполнить</button></a>
                </div>
            </div>
            <x-footer/>
        </div>
    </body>
</html>
