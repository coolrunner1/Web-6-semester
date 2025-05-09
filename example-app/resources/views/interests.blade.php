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
    </head>
    <body id="myinterests">
        <x-navbar/>
        <div class="content-container myinterests-content">
            <h1 class="information">Мои интересы</h1>
            <ol>
                <lh>Содержимое</lh>
                @for ($i = 0; $i < count($titles); $i++)
                    <li><a href="{{"#int".$i+1}}" class="hero-secondary-but black-but">{{$titles[$i]}}</a></li>
                @endfor
            </ol>
            <div id="interests-container">
            @for ($i = 0; $i < count($interests); $i++)
                    <h2 id="int1">{{$interests[$i]['title']}}</h2>
                    <div class="interest-content">
                        @if ($i % 2 == 0)
                            <p>{{$interests[$i]['content']}}</p>
                            <img src="{{ url($interests[$i]['image']) }}" alt={{$interests[$i]['alt']}} title="Games" class="image-with-border interests-image">
                        @else
                            <img src="{{ url($interests[$i]['image']) }}" alt={{$interests[$i]['alt']}} title="Games" class="image-with-border interests-image">
                            <p>{{$interests[$i]['content']}}</p>
                        @endif
                    </div>
            @endfor
            </div>
        </div>
        <x-footer/>
    </body>
</html>
