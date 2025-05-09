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
        @vite('resources/js/script.js')
        @vite('resources/js/timer.js')
        @vite('resources/js/history.js')
    </head>
    <body>
        <x-navbar />
        <div class="content-container">
            <div class="information">История посещений</div>
            <div id="history-container">
                <div id="session-storage-stats">
                    <button id="get-session-storage-stats">Получить сведения о посещённых страницах за эту сессию</button>
                </div>
                <div id="cookie-storage-stats">
                    <button id="get-cookie-storage-stats">Получить сведения о посещённых страницах за всё время</button>
                </div>
            </div>
            <x-footer/>
        </div>
    </body>
</html>
