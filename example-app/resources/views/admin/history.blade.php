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
    <body>
        <x-navbar />
        <div class="content-container">
            <div class="information">Статистика посещений</div>
            @if (count($visits))
                <table>
                    <thead>
                    <tr>
                        <th>Дата и время посещения</th>
                        <th>Web-страница посещения</th>
                        <th>IP-адрес компьютера посетителя</th>
                        <th>Имя хоста компьютера посетителя</th>
                        <th>Название браузера, который использовал посетитель</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($visits as $visit)
                        <tr>
                            <td>{{$visit->visited_at}}</td>
                            <td>{{$visit->page}}</td>
                            <td>{{$visit->ip}}</td>
                            <td>{{$visit->host}}</td>
                            <td>{{$visit->user_agent}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="page-controls-container">{{ $visits->links() }}</div>
            @else
                <div class="hero-secondary">История посещений отсутствует</div>
            @endif

            <x-footer/>
        </div>
    </body>
</html>
