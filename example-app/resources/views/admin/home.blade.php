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

        @vite('resources/js/jquery-3.7.1.min.js')
        @vite('resources/js/timer.js')
    </head>
    <body id="main-page">
        <x-admin-navbar/>
        <div class="content-container">
            <div id="top">
                <div class="top-div">
                    @auth
                        <div class="hero">Добро пожаловать, {{auth()->user()->name}}</div>
                    @endauth
                    <div class="hero-secondary">ЛАБОРАТОРНАЯ РАБОТА №11 - Исследование возможностей асинхронного взаимодействия с сервером. Технология AJAX</div>
                </div>
                <img src="{{url('storage/home/ajax.gif')}}" title="AJAX" alt="ajax" width="600" height="330">
            </div>
            <x-footer/>
        </div>
    </body>
</html>
