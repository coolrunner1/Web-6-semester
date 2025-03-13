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
    <body id="contact">
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
        <div class="content-container">
            <div class="information">Обратная связь</div>
            <div class="secondary-contact-text">Если у вас есть пожелания по улучшению этого сайта, заполните данную форму</div>
            <form id="survey-form" action="mailto:youraddr@domain.com?subject=dsifisdf" method="GET">
                <div class="input-container" id="name-container">
                    <label id="name-label" for="name"><span class="label-text">Фамилия Имя Отчество</span><input id="name" type="text" placeholder="Введите своё имя" required /></label>
                </div>
                <div class="input-container" id="email-container">
                    <label id="email-label"  for="email"><span class="label-text">Электронная почта</span><input id="email" type="email" placeholder="Введите свою почту" required /></label>
                </div>
                <div class="input-container" id="number-container">
                    <label id="number-label"  for="number"><span class="label-text">Телефон</span><input id="number" type="text" placeholder="Введите свой номер телефона" required /></label>
                </div>
                <div class="input-container" id="age-container">
                    <label id="age-label"  for="age"><span class="label-text">Возраст</span><input id="age" type="number" min=0 max=150 placeholder="Введите свой возраст" required /></label>
                </div>
                <div id="myboxes">
                    <label>Пол</label>
                    <div>
                        <label class="check"><input type="radio" name="conditions"  class="radios" value="male"/> Мужской</label>
                        <label class="check"><input type="radio" class="radios" name="conditions" value="female"/> Женский</label>
                    </div>
                </div>
                <div class="input-container" id="date-container">
                    <label id="date-label"  for="date"><span class="label-text">Дата рождения</span><input id="date" type="date" required readonly /></label>
                    <div id="calendar-container"></div>
                </div>
                <div class="input-container" id="text-container">
                    <label id="topic-label" for="text"><span class="label-text">Тема</span><input name="subject" id="text" type="text" placeholder="Введите тему письма" required /></label>
                </div>
                <label>
                    <span class="label-text">Пожелания</span>
                    <textarea name="body"></textarea>
                </label>
                <div class="bottom-buttons">
                    <button id="but2" type="button">Отправить</button>
                    <button id="but3" type="button">Очистить</button>
                </div>
            </form>
            <footer>
                <div class="foot-text">Copyleft coolrunner1 2025</div>
            </footer>
        </div>
    </body>
</html>
