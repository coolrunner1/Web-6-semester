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
    <body id="myinterests">
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
        <div class="content-container myinterests-content">
            <div></div>
            <h1 class="information">Мои интересы</h1>
            <ol>
                <lh>Содержимое</lh>
                <li><a href="#int1" class="hero-secondary-but black-but">Одним из моих главных хобби являются игры</a></li>
                <li><a href="#int2" class="hero-secondary-but black-but">Я активно изучаю английский язык</a></li>
                <li><a href="#int3" class="hero-secondary-but black-but">Книги занимают особое место в моем сердце</a></li>
                <li><a href="#int4" class="hero-secondary-but black-but">Фильмы тоже играют важную роль в моей жизни</a></li>
            </ol>
            <div id="interests-container"></div>
            <h2 id="int1">Одним из моих главных хобби являются игры</h2>
            <div class="interest-content">
                <p>Одним из моих главных хобби являются игры. Я люблю погружаться в виртуальные миры, где могу испытать свои навыки, стратегическое мышление и просто насладиться захватывающими историями. Игры позволяют мне расслабиться и отвлечься от повседневной рутины.</p>
                <img src="../assets/images/360_F_574057895_pHarnRepLEdwoGuXhq9YZqPihKaBjUoU.jpg" alt="games" title="Games" class="image-with-border interests-image">
            </div>
            <h2 id="int2">Я активно изучаю английский язык</h2>
            <div class="interest-content interest-reverse">
                <p>Также я активно изучаю английский язык. Это не только полезный навык, но и возможность открыть для себя новые горизонты. Знание английского позволяет мне общаться с людьми из разных стран, а также наслаждаться оригинальными версиями книг и фильмов. Я считаю, что изучение языка — это увлекательное путешествие, которое открывает двери к новым культурам и идеям.</p>
                <img src="../assets/images/london-441853_960_720.jpg" alt="london" title="London" class="image-with-border interests-image">
            </div>
            <h2 id="int3">Книги занимают особое место в моем сердце</h2>
            <div class="interest-content">
                <p>Книги занимают особое место в моем сердце. Я люблю читать разные жанры: от фантастики и фэнтези до классической литературы и научной прозы. Каждая книга — это возможность увидеть мир глазами другого человека, пережить его эмоции и испытания. Чтение развивает воображение и расширяет кругозор.</p>
                <img src="../assets/images/rptgtpxd-1396254731.jpg" alt="books" title="Books" class="image-with-border interests-image">
            </div>
            <h2 id="int4">Фильмы тоже играют важную роль в моей жизни</h2>
            <div class="interest-content interest-reverse">
                <p>Фильмы тоже играют важную роль в моей жизни. Я наслаждаюсь просмотром различных жанров, от драм до комедий и триллеров. Кино — это искусство, которое способно передать глубокие чувства и идеи, а также заставить задуматься о важных вопросах. Я люблю обсуждать фильмы с друзьями и делиться своими впечатлениями.</p>
                <img src="../assets/images/depositphotos_58955513-stock-photo-empty-movie-theater-with-red.jpg" alt="movies" title="Movies" class="image-with-border interests-image">
            </div>
        </div>
        <footer>
            <div class="foot-text">Copyleft coolrunner1 2025</div>
        </footer>
    </body>
</html>
