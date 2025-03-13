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
            <div class="information">Тест по дисциплине "Инженерная графика"</div>
            <form id="survey-form" action="mailto:youraddr@domain.com?subject=Test" method="GET">
                <label id="name-label" for="name" class="test"><span class="label-text">Фамилия Имя Отчество</span>
                    <span class="input-container input-container-test" id="name-container"><input id="name" type="text" placeholder="Введите своё имя" required /></span>
                </label>
                <label for="dropdown" class="test">
                    <span class="label-text">Группа</span>
                    <select id="dropdown">
                        <option>ИТ/б-24-1-о</option>
                        <option>ИТ/б-24-2-о</option>
                        <option>ИТ/б-24-3-о</option>
                        <option>ИТ/б-24-4-о</option>
                        <option>ИТ/б-24-5-о</option>
                        <option>ИТ/б-24-6-о</option>
                        <option>ИТ/б-24-7-о</option>
                        <option>ИТ/б-24-8-о</option>
                        <option>ИТ/б-23-1-о</option>
                        <option>ИТ/б-23-2-о</option>
                        <option>ИТ/б-23-3-о</option>
                        <option>ИТ/б-23-4-о</option>
                        <option>ИТ/б-23-5-о</option>
                        <option>ИТ/б-23-6-о</option>
                        <option>ИТ/б-23-7-о</option>
                        <option>ИТ/б-23-8-о</option>
                        <option>ИВТ/б-22-1-о</option>
                        <option>ИВТ/б-22-2-о</option>
                        <option>ИС/б-22-1-о</option>
                        <option>ИС/б-22-2-о</option>
                        <option>ПИ/б-22-1-о</option>
                        <option>ПИ/б-22-2-о</option>
                        <option>ПИН/б-22-1-о</option>
                        <option>ПИН/б-22-2-о</option>
                        <option>ИВТ/б-21-1-о</option>
                        <option>ИВТ/б-21-2-о</option>
                        <option>ИВТ/б-21-3-о</option>
                        <option>ИС/б-21-1-о</option>
                        <option>ИС/б-21-2-о</option>
                        <option>ИС/б-21-3-о</option>
                        <option>ПИ/б-21-1-о</option>
                        <option>ПИН/б-21-1-о</option>
                    </select>
                </label>
                <label id="age-label"  for="age" class="test"><span class="label-text">Возраст</span><input id="age" type="number" min=0 max=150 placeholder="Введите свой возраст" required /></label>
                <div class="input-container" id="question1-container">
                    <label id="question1-label" for="question1" class="test"><span class="label-text">Документ, определяющий состав сборочной единицы, комплекса или комплекта, называется </span><input id="question1" type="text" placeholder="Введите ответ" required /></label>
                </div>
                <div id="myboxes" class="test">
                    <label class="label-text">К группе деталей относят изделие</label>
                    <label class="check" id="plane-label">Самолёт
                        <input type="checkbox" id="plane" value="plane" class="checkboxes"/>
                    </label>
                    <label class="check" id="bolt-label">Болт
                        <input type="checkbox" id="bolt" value="bolt" class="checkboxes"/>
                    </label>
                    <label class="check" id="vent-label">Вентиль
                        <input type="checkbox" id="vent" value="vent" class="checkboxes"/>
                    </label>
                    <label class="check" id="scissors-label">Ножницы
                        <input type="checkbox" id="scissors" value="scissors" class="checkboxes"/>
                    </label>
                </div>
                <label for="dropdown2" class="test"><span class="label-text">Из чего состоит квадрат?</span></label>
                <select id="dropdown2">
                    <optgroup label="Линии">
                        <option>Прямые линии</option>
                        <option>Прерывистые линии</option>
                        <option>Пунктирные линии</option>
                    </optgroup>
                    <optgroup label="Кривые">
                        <option>Прямые кривые</option>
                        <option>Прерывистые кривые</option>
                        <option>Пунктирные кривые</option>
                    </optgroup>
                    <optgroup label="Ломаные">
                        <option>Прямые ломаные</option>
                        <option>Прерывистые ломаные</option>
                        <option>Пунктирные ломаные</option>
                    </optgroup>
                </select>
                <div id="result"></div>
                <div class="bottom-buttons">
                    <button id="but4" type="button">Проверить</button>
                    <button id="but2" type="button">Отправить</button>
                    <button id="but3" type="button">Очистить</button>
                </div>
            </form>
        </div>
        <footer>
            <div class="foot-text">Copyleft coolrunner1 2025</div>
        </footer>
    </body>
</html>
