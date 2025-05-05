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
                        <a href="{{url("/login")}}"><button id='no-popup'>Вернуться к форме входа</button></a>
                    </div>
                </div>
            </div>
        @endif
        <div class="content-container">
            <form class="login-form" action="{{url("/login")}}" method="POST">
                @csrf <!-- {{ csrf_field() }} -->
                <div class="information color-white">Логин</div>
                <div>Не зарегистрированы? <a href="{{url("/register")}}" class="hero-secondary-but login-form-link">Зарегистрируйтесь сейчас!</a></div>
                <label id="login-label" for="login" class="test"><span class="label-text">Логин или почта</span>
                    <span class="input-container input-container-test" id="login-container">
                        <input id="login" name="login" type="text" placeholder="Введите логин или почту" required />
                    </span>
                </label>
                <label id="password-label" for="name" class="test"><span class="label-text">Пароль</span>
                    <span class="input-container input-container-test" id="password-container">
                        <input id="password" name="password" type="password" placeholder="Введите пароль" required />
                    </span>
                </label>
                <div class="bottom-buttons">
                    <button id="but2" type="submit">Войти</button>
                </div>
            </form>
        </div>
        <x-footer/>
    </body>
</html>
