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
    <body>
        <x-navbar/>
        <div id="middle">
            <div class="information">Фотоальбом</div>
            @if (count($photos) % 3 == 0)
                @for ($i = 0; $i < count($photos); $i+=3)
                    <div class="my-images">
                        <div class="img-intern">
                            <img src="{{ url($photos[$i]['path']) }}" alt="{{ $photos[$i]['alt'] }}" title="{{ $photos[$i]['title'] }}" class="image-with-border">
                            <div class="img-descr">{{ $photos[$i]['title'] }}</div>
                        </div>
                        <div class="img-intern">
                            <img src="{{ url($photos[$i+1]['path']) }}" alt="{{ $photos[$i+1]['alt'] }}" title="{{ $photos[$i+1]['title'] }}" class="image-with-border">
                            <div class="img-descr">{{ $photos[$i+1]['title'] }}</div>
                        </div>
                        <div class="img-intern">
                            <img src="{{ url($photos[$i+2]['path']) }}" alt="{{ $photos[$i+2]['alt'] }}" title="{{ $photos[$i+2]['title'] }}" class="image-with-border">
                            <div class="img-descr">{{ $photos[$i+2]['title'] }}</div>
                        </div>
                    </div>
                @endfor
            @else
                @foreach($photos as $photo)
                    <div class="img-intern">
                        <img src="{{ url($photo['path']) }}" alt="{{ $photo['alt'] }}" title="{{ $photo['title'] }}" class="image-with-border">
                        <div class="img-descr">{{ $photo['title'] }}</div>
                    </div>
                @endforeach
            @endif
        </div>
        <x-footer/>
    </body>
</html>
