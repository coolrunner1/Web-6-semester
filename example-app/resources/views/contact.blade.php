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
    <body id="contact">
        <x-navbar/>
        @if ($success)
            <div id='fullscreen-overlay'>
                <div class='pop-up'>
                    Ваше письмо было успешно отправлено!
                    <div class='bottom-buttons'>
                        <a href="{{url("/")}}"><button id='yes-popup'>Вернуться домой</button></a>
                        <a href="{{url("/contact")}}"><button id='yes-popup'>Вернуться к форме</button></a>
                    </div>
                </div>
            </div>
        @endif
        @if (count($errors) > 0)
            <div id='fullscreen-overlay'>
                <div class='pop-up'>
                    <ul class="error-list">
                        <lh>Ошибки</lh>
                        @foreach($errors as $error)
                            <li class="hero-secondary">{{$error}}</li>
                        @endforeach
                    </ul>
                    <div class='bottom-buttons'>
                        <a href="{{url("/")}}"><button id='yes-popup'>Вернуться домой</button></a>
                        <a href="{{url("/contact")}}"><button id='yes-popup'>Вернуться к форме</button></a>
                    </div>
                </div>
            </div>
        @endif
        <div class="content-container">
            <div class="information">Обратная связь</div>
            <div class="secondary-contact-text">Если у вас есть пожелания по улучшению этого сайта, заполните данную форму</div>
            <form id="survey-form" action="{{url("/contact")}}" method="POST">
                @csrf <!-- {{ csrf_field() }} -->
                <div class="input-container" id="name-container">
                    <label id="name-label" for="name">
                        <span class="label-text">Фамилия Имя Отчество</span>
                        <input id="name" name="name" type="text" placeholder="Введите своё имя" required /></label>
                </div>
                <div class="input-container" id="email-container">
                    <label id="email-label" for="email">
                        <span class="label-text">Электронная почта</span>
                        <input id="email" name="email" type="email" placeholder="Введите свою почту" required />
                    </label>
                </div>
                <div class="input-container" id="number-container">
                    <label id="number-label" for="number">
                        <span class="label-text">Телефон</span>
                        <input id="number" name="phone" type="text" placeholder="Введите свой номер телефона" required />
                    </label>
                </div>
                <div class="input-container" id="age-container">
                    <label id="age-label" for="age">
                        <span class="label-text">Возраст</span>
                        <input id="age" name="age" type="number" min=0 max=150 placeholder="Введите свой возраст" required />
                    </label>
                </div>
                <div id="myboxes">
                    <label>Пол</label>
                    <div>
                        <label class="check"><input type="radio" class="radios" name="sex" value="male" required/> Мужской</label>
                        <label class="check"><input type="radio" class="radios" name="sex" value="female" required/> Женский</label>
                    </div>
                </div>
                <div class="input-container" id="date-container">
                    <label id="date-label" for="date">
                        <span class="label-text">Дата рождения</span>
                        <input id="date" name="birthdate" type="date" required />
                    </label>
                    <!--<div id="calendar-container"></div>-->
                </div>
                <div class="input-container" id="text-container">
                    <label id="topic-label" for="text">
                        <span class="label-text">Тема</span>
                        <input name="subject" id="text" type="text" placeholder="Введите тему письма" required />
                    </label>
                </div>
                <label>
                    <span class="label-text">Пожелания</span>
                    <textarea name="body"></textarea>
                </label>
                <div class="bottom-buttons">
                    <button id="but2" type="submit">Отправить</button>
                    <button id="but3" type="reset">Очистить</button>
                </div>
            </form>
            <x-footer/>
        </div>
    </body>
</html>
