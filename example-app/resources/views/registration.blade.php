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
                    Учётная запись была успешно создана!
                    <div class='bottom-buttons'>
                        <a href="{{url("/")}}"><button id='yes-popup'>Ок</button></a>
                    </div>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div id='fullscreen-overlay'>
                <div class='pop-up'>
                    <ul class="error-list">
                        <lh>Ошибки</lh>
                        @foreach($errors->all() as $error)
                            <li class="hero-secondary">{{$error}}</li>
                        @endforeach
                    </ul>
                    <div class='bottom-buttons'>
                        <a href="{{url("/")}}"><button id='yes-popup'>Вернуться домой</button></a>
                        <a href="{{url("/register")}}"><button id='yes-popup'>Вернуться к форме регистрации</button></a>
                    </div>
                </div>
            </div>
        @endif
        <div class="content-container">
            <form class="login-form" action="{{url("/register")}}" method="POST">
                @csrf <!-- {{ csrf_field() }} -->
                <div class="information color-white">Регистрация</div>
                <div>Уже зарегистрированы? <a href="{{url("/login")}}" class="hero-secondary-but login-form-link">Войдите сейчас!</a></div>
                <label id="login-label" for="name" class="test"><span class="label-text">Фамилия Имя Отчество</span>
                    <span class="input-container input-container-test" id="login-container">
                        <input id="name" name="name" type="text" placeholder="Введите своё имя" required />
                    </span>
                </label>
                <label id="login-label" for="login" class="test"><span class="label-text">Логин</span>
                    <span class="input-container input-container-test" id="login-container">
                        <input id="login" name="login" type="text" placeholder="Введите логин" required />
                    </span>
                </label>
                <label id="email-label" for="email" class="test">
                    <span class="label-text">Электронная почта</span>
                    <span class="input-container input-container-test" id="email-container">
                        <input id="email" name="email" type="email" placeholder="Введите свою почту" required />
                    </span>
                </label>
                <label id="password-label" for="password" class="test"><span class="label-text">Пароль</span>
                    <span class="input-container input-container-test" id="password-container">
                        <input id="password" name="password" type="password" placeholder="Введите пароль" required />
                    </span>
                </label>
                <label id="confirm-password-label" for="password_confirmation" class="test"><span class="label-text">Подтверждение пароля</span>
                    <span class="input-container input-container-test" id="password-container">
                        <input id="confirm-password" name="password_confirmation" type="password" placeholder="Введите пароль повторно" required />
                    </span>
                </label>
                <div class="bottom-buttons">
                    <button id="but2" type="submit">Зарегистрироваться</button>
                </div>
            </form>
        </div>
        <x-footer/>
    </body>
</html>
