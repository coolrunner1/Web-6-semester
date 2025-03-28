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
                        <a href="{{url("/guestbook")}}"><button id='no-popup'>Вернуться к форме</button></a>
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
                        <a href="{{url("/contact")}}"><button id='no-popup'>Вернуться к форме</button></a>
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
                    <button id="but3" type="reset">Очистить</button>
                </div>
            </form>
            <div class="secondary-contact-text">Отзывы пользователей</div>
            <div class="reviews-container">
                @if (count($reviews) > 0)
                    @foreach($reviews as $review)
                        <div class="review-container">
                            <div class="review-header">{{$review->name}} ({{$review->email}}) {{$review->created_at}}</div>
                            <div class="review-body">{{$review->body}}</div>
                        </div>

                    @endforeach
                @else
                    <div class="hero-secondary">No reviews yet</div>
                @endif
            </div>
            <x-footer/>
        </div>
    </body>
</html>
