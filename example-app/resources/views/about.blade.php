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
        <div id="quote">
            <div class="quote-text">“Я, Чикнаев Василий Эдуардович, родился 21 декабря 1959 года в Российской Федерации, в г. Новосибирске. В 1967 году я пошел в среднюю школу № 2 г. Кишинева, которую окончил в 1977 году. В 1977 году я поступил в Одесский Политехнический институт, который закончил в 1982 году по специальности инженер – теплоэнергетик. В 1982 году началась моя трудовая биография. В настоящее время я работаю Директором предприятия "Cicnaev Eugen" в г. Кишиневе. В настоящее время проживаю по адресу: Республика Молдова, г. Кишинев, ул Индепенденций, 18. Женат. Жена – Чикнаева Людмила Андреевна, 1965 года рождения, русская, образование – высшее, работает, проживает со мной. Сын – Михаил, 1997 года рождения, проживает со мной. Мать – Чикнаева (Антоненкова) Ольга Ивановна, 1935 года рождения, болгарка, образование высшее, пенсионер, проживает по адресу: Республика Молдова г.Кишинев, ул. Роз, 123. Отец – Чикнаев Эдуард Федорович, 1935 года рождения, русский, образование высшее, пенсионер, проживает по адресу: Республика Молдова г.Кишинев, ул. Роз, 123. Я не судим, беспартийный, православный христианин. г. Кишинев 30.12.2009 г.”</div>
            <div class="quote-auth">– Автобиография</div>
        </div>
        <footer>
            <div class="foot-text">Copyleft coolrunner1 2025</div>
        </footer>
    </body>
</html>
