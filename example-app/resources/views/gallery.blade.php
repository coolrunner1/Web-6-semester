<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                                <div class="interests-item-svg"></div>
                            </div>
                            <div class="interests-dropdown-item">
                                <a href="{{ url('/interests#int2') }}" class="hero-secondary-but">Английский язык</a>
                                <div class="interests-item-svg"></div>
                            </div>
                            <div class="interests-dropdown-item">
                                <a href="{{ url('/interests#int3') }}" class="hero-secondary-but">Книги</a>
                                <div class="interests-item-svg"></div>
                            </div>
                            <div class="interests-dropdown-item">
                                <a href="{{ url('/interests#int4') }}" class="hero-secondary-but">Фильмы</a>
                                <div class="interests-item-svg"></div>
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
            <div class="my-images">
                <div class="img-intern">
                    <img src="../assets/images/nmuax05zxoab1.gif" alt="c" title="C" class="image-with-border">
                    <div class="img-descr">C</div>
                </div>
                <div class="img-intern">
                    <img src="../assets/images/xxodzo30yoab1.gif" alt="c++" title="C++" class="image-with-border">
                    <div class="img-descr">C++</div>
                </div>
                <div class="img-intern">
                    <img src="../assets/images/fe36cc42774743.57ee5f329fae6.gif" alt="rust" title="Rust" class="image-with-border">
                    <div class="img-descr">Rust</div>
                </div>
            </div>
            <div class="my-images">
                <div class="img-intern">
                    <img src="../assets/images/vzkhe4s8dlab1.gif" alt="c#" title="C#" class="image-with-border">
                    <div class="img-descr">C#</div>
                </div>
                <div class="img-intern">
                    <img src="../assets/images/java.gif" alt="java" title="Java" class="image-with-border">
                    <div class="img-descr">Java</div>
                </div>
                <div class="img-intern">
                    <img src="../assets/images/gopher-workout.gif" alt="go" title="Go" class="image-with-border">
                    <div class="img-descr">Go</div>
                </div>
            </div>
            <div class="my-images">
                <div class="img-intern">
                    <img src="../assets/images/0*OxDZ95Af_-7Ih_-m.gif" alt="python" title="Python" class="image-with-border">
                    <div class="img-descr">Python</div>
                </div>
                <div class="img-intern">
                    <img src="../assets/images/js-javascript.gif" alt="javascript" title="Javascript" class="image-with-border">
                    <div class="img-descr">Javascript</div>
                </div>
                <div class="img-intern">
                    <img src="../assets/images/1*zoZ91dWACun-Acph7snQkw.gif" alt="ruby" title="Ruby" class="image-with-border">
                    <div class="img-descr">Ruby</div>
                </div>
            </div>
            <div class="my-images">
                <div class="img-intern">
                    <img src="../assets/images/1200px-Kotlin_Icon.png" alt="kotlin" title="Kotlin" class="image-with-border">
                    <div class="img-descr">Kotlin</div>
                </div>
                <div class="img-intern">
                    <img src="../assets/images/swift-og.png" alt="swift" title="Swift" class="image-with-border">
                    <div class="img-descr">Swift</div>
                </div>
                <div class="img-intern">
                    <img src="../assets/images/2048px-Dart_programming_language_logo_icon.svg.png" alt="dart" title="Dart" class="image-with-border">
                    <div class="img-descr">Dart</div>
                </div>
            </div>
            <div class="my-images">
                <div class="img-intern">
                    <img src="../assets/images/VBA_250x250.png" alt="vba" title="VBA" class="image-with-border">
                    <div class="img-descr">VBA</div>
                </div>
                <div class="img-intern">
                    <img src="../assets/images/021521_Fiverr_Pascal.webp" alt="pascal" title="Pascal" class="image-with-border">
                    <div class="img-descr">Pascal</div>
                </div>
                <div class="img-intern">
                    <img src="../assets/images/306px-HolyC_Logo.svg.png" alt="holyc" title="HolyC" class="image-with-border">
                    <div class="img-descr">Holy C</div>
                </div>
            </div>
        </div>
        <footer>
            <div class="foot-text">Copyleft coolrunner1 2025</div>
        </footer>
    </body>
</html>
