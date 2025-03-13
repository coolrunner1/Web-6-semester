<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Моя страница</title>
        <link rel="icon" sizes="any" type="image/svg+xml" href="{{url('storage/icons/home-2741413_960_720.png')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body>
        <header>
            <div><a href="{{ url('/') }}" class="hero-header">Моя страница</a></div>
            <div class="small-items">
                <div class="nav-but-container">
                    <a href="{{ url('/') }}" class="hero-secondary-but" title="Main-page">Главная страница</a>
                </div>
                <div class="nav-but-container">
                    <a href="{{ url('/about') }}" class="hero-secondary-but" title="About">Обо мне</a>
                </div>
                <div class="nav-but-container">
                    <a href="{{ url('/interests') }}" class="hero-secondary-but" title="Interests">Мои интересы</a>
                    <div class="overlay">
                        <a href="{{ url('/interests') }}" class="hero-secondary-but" title="Interests">Мои интересы</a>
                        <div class="content-box interests-dropdown">
                            <div class="interests-dropdown-item">
                                <a href="{{ url('/interests#int1') }}" class="hero-secondary-but">Игры</a>
                            </div>
                            <div class="interests-dropdown-item">
                                <a href="{{ url('/interests#int2') }}" class="hero-secondary-but">Английский язык</a>
                            </div>
                            <div class="interests-dropdown-item">
                                <a href="{{ url('/interests#int3') }}" class="hero-secondary-but">Книги</a>
                            </div>
                            <div class="interests-dropdown-item">
                                <a href="{{ url('/interests#int4') }}" class="hero-secondary-but">Фильмы</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-but-container">
                    <a href="{{ url('/studies') }}" class="hero-secondary-but" title="Studies">Учёба</a>
                </div>
                <div class="nav-but-container">
                    <a href="{{ url('/gallery') }}" class="hero-secondary-but" title="Gallery">Фотоальбом</a>
                </div>
                <div class="nav-but-container">
                    <a href="{{ url('/contact') }}" class="hero-secondary-but" title="Contacts">Контакт</a>
                </div>
                <div class="nav-but-container">
                    <a href="{{ url('/test') }}" class="hero-secondary-but" title="Test">Тест</a>
                </div>
                <!-- Will be used in lab #10
                <div class="nav-but-container">
                    <a href="history.html" class="hero-secondary-but" title="View history">История</a>
                </div>
                -->
            </div>
        </header>
        <div id="filler-top"></div>
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
        <footer>
            <div class="foot-text">Copyleft coolrunner1 2025</div>
        </footer>
    </body>
</html>
