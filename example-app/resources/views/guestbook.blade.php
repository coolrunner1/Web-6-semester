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

        @vite('resources/js/jquery-3.7.1.min.js')
        @if (!(auth()->check() && auth()->user()->hasRole(1)))
            @vite('resources/js/script.js')
        @endif
        @vite('resources/js/timer.js')
        @vite('resources/js/erase.js')
    </head>
    <body id="contact">
        <x-navbar/>
        @if ($success)
            <div id='fullscreen-overlay'>
                <div class='pop-up'>
                    Ваш отзыв был успешно отправлен!
                    <div class='bottom-buttons'>
                        <a href="{{url("/")}}"><button id='yes-popup'>Вернуться домой</button></a>
                        @if (auth()->check() && auth()->user()->hasRole(1))
                            <a href="{{url("/admin/guestbook")}}"><button id='no-popup'>Вернуться к форме</button></a>
                        @else
                            <a href="{{url("/guestbook")}}"><button id='no-popup'>Вернуться к форме</button></a>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        @if ($errors->any() || count($errorsList))
            <div id='fullscreen-overlay'>
                <div class='pop-up'>
                    <ul class="error-list">
                        <lh>Ошибки</lh>
                        @foreach($errorsList as $error)
                            <li class="hero-secondary">{{$error}}</li>
                        @endforeach
                        @foreach($errors->all() as $error)
                            <li class="hero-secondary">{{$error}}</li>
                        @endforeach
                    </ul>
                    <div class='bottom-buttons'>
                        <a href="{{url("/")}}"><button id='yes-popup'>Вернуться домой</button></a>
                        @if (auth()->check() && auth()->user()->hasRole(1))
                            <a href="{{url("/admin/guestbook")}}"><button id='no-popup'>Вернуться к форме</button></a>
                        @else
                            <a href="{{url("/guestbook")}}"><button id='no-popup'>Вернуться к форме</button></a>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div class="guestbook-content-container">
            <div class="information">Гостевая книга</div>
            <div class="secondary-contact-text">Оставьте отзыв о сайте</div>
            <form id="survey-form" action="{{url("/guestbook/reviews")}}" method="POST">
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
                <label>
                    <span class="label-text">Текст отзыва</span>
                    <textarea name="body" required ></textarea>
                </label>
                <div class="bottom-buttons">
                    <button id="but2" type="submit">Отправить</button>
                    <button id="but3" type="button">Очистить</button>
                </div>
            </form>
            <div class="secondary-contact-text">Отзывы пользователей</div>
            <div class="reviews-container">
                @if (auth()->check() && auth()->user()->hasRole(1))
                    <div class="review-buttons-container">
                        <a href="{{url("/admin/guestbook/reviews/download")}}"><button class="form-button">Скачать файл с отзывами</button></a>
                        <form action="{{url("/admin/guestbook/reviews/upload")}}" method="POST" enctype="multipart/form-data" class="upload-form">
                            @csrf
                            <input type="file" name="text_file" accept=".inc" class="upload-input" required>
                            <button class="form-button">Опубликовать из файла</button>
                        </form>
                    </div>
                @endif
                @if (count($reviews) > 0)
                    @foreach($reviews as $review)
                        <div class="review-container">
                            <div class="review-header">{{$review['name']}} ({{$review['email']}}) {{$review['date']}}</div>
                            <div class="review-body">{{$review['body']}}</div>
                        </div>
                    @endforeach
                @else
                    <div class="hero-secondary">Отзывы отсутствуют</div>
                @endif
            </div>
            <x-footer/>
        </div>
    </body>
</html>
