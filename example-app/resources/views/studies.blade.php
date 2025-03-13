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
            <div class="information">Севастопольский Государственный Университет</div>
            <div class="secondary-contact-text">Кафедра "Информационные системы"</div>
            <table>
                <tr>
                    <th colspan="9">ПЛАН УЧЕБНОГО ПРОЦЕССА</th>
                </tr>
                <tr>
                    <th rowspan="2">№</th>
                    <th rowspan="2">Дисциплина</th>
                    <th rowspan="2">Кафедра</th>
                    <th colspan="6">Всего часов</th>
                </tr>
                <tr>
                    <th>Всего</th>
                    <th>Ауд</th>
                    <th>Лк</th>
                    <th>Лб</th>
                    <th>Пр</th>
                    <th>СРС</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Экология</td>
                    <td>БЖ</td>
                    <td>54</td>
                    <td>27</td>
                    <td>18</td>
                    <td>0</td>
                    <td>9</td>
                    <td>27</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Высшая математика</td>
                    <td>ВМ</td>
                    <td>540</td>
                    <td>282</td>
                    <td>141</td>
                    <td>0</td>
                    <td>141</td>
                    <td>258</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Русский язык и культура речи</td>
                    <td>НГиГ</td>
                    <td>108</td>
                    <td>54</td>
                    <td>18</td>
                    <td>0</td>
                    <td>36</td>
                    <td>54</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Основы дискретной математики</td>
                    <td>ИС</td>
                    <td>216</td>
                    <td>139</td>
                    <td>87</td>
                    <td>0</td>
                    <td>52</td>
                    <td>77</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Основы программирования и алгоритмические языки</td>
                    <td>ИС</td>
                    <td>405</td>
                    <td>210</td>
                    <td>105</td>
                    <td>87</td>
                    <td>18</td>
                    <td>195</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Основы экологии</td>
                    <td>ПЭОП</td>
                    <td>54</td>
                    <td>27</td>
                    <td>18</td>
                    <td>0</td>
                    <td>9</td>
                    <td>27</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Теория вероятностей и математическая статистика</td>
                    <td>ИС</td>
                    <td>162</td>
                    <td>72</td>
                    <td>54</td>
                    <td>18</td>
                    <td>0</td>
                    <td>90</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Физика</td>
                    <td>Физики</td>
                    <td>324</td>
                    <td>194</td>
                    <td>106</td>
                    <td>88</td>
                    <td>0</td>
                    <td>130</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Основы электротехники и электроники</td>
                    <td>ИС</td>
                    <td>108</td>
                    <td>72</td>
                    <td>36</td>
                    <td>18</td>
                    <td>18</td>
                    <td>36</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Численные методы в информатике</td>
                    <td>ИС</td>
                    <td>108</td>
                    <td>72</td>
                    <td>36</td>
                    <td>18</td>
                    <td>18</td>
                    <td>36</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Методы исследования операций</td>
                    <td>ИС</td>
                    <td>108</td>
                    <td>72</td>
                    <td>36</td>
                    <td>18</td>
                    <td>18</td>
                    <td>36</td>
                </tr>
            </table>
        </div>
        <footer>
            <div class="foot-text">Copyleft coolrunner1 2025</div>
        </footer>
    </body>
</html>
