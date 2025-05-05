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
        <x-admin-navbar/>
        @if ($success)
            <div id='fullscreen-overlay'>
                <div class='pop-up'>
                    Ваш пост был успешно отправлен!
                    <div class='bottom-buttons'>
                        <a href="{{url("/")}}"><button id='yes-popup'>Вернуться домой</button></a>
                        <a href="{{url("/admin/blog")}}"><button id='no-popup'>Вернуться к форме</button></a>
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
                        <a href="{{url("/admin/blog")}}"><button id='no-popup'>Вернуться к форме</button></a>
                    </div>
                </div>
            </div>
        @endif
        <div class="guestbook-content-container">
            <div class="information">Редактирование блога</div>
            <div class="secondary-contact-text">Добавьте новую запись в блог</div>
            <form id="survey-form" enctype="multipart/form-data" action="{{url("/blog/add")}}" method="POST">
                @csrf <!-- {{ csrf_field() }} -->
                <div class="input-container" id="author-container">
                    <label id="author-label" for="author">
                        <span class="label-text">Автор</span>
                        <input id="author" name="author" type="text" placeholder="Введите ФИО автора" required />
                    </label>
                </div>
                <div class="input-container" id="topic-container">
                    <label id="topic-label" for="topic">
                        <span class="label-text">Тема сообщения</span>
                        <input id="topic" name="topic" type="text" placeholder="Введите тему сообщения" required />
                    </label>
                </div>
                <div class="input-container" id="image-container">
                    <label id="image-label" for="image">
                        <span class="label-text">Изображение</span>
                        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/gif, image/svg" class="upload-input" />
                    </label>
                </div>
                <label>
                    <span class="label-text">Текст сообщения</span>
                    <textarea name="body" required ></textarea>
                </label>
                <div class="bottom-buttons">
                    <button id="but2" type="submit">Отправить</button>
                    <button id="but3" type="reset">Очистить</button>
                </div>
            </form>
            <div class="secondary-contact-text">Записи блога</div>
            <div class="blogs-container">
                <div class="blog-buttons-container">
                    <a href="{{url("/blog/download")}}"><button class="form-button">Скачать файл с записями блога</button></a>
                    <form action="{{url("/blog/upload")}}" method="POST" enctype="multipart/form-data" class="upload-form">
                        @csrf
                        <input type="file" name="csv_file" accept=".csv" class="upload-input" required>
                        <button class="form-button">Опубликовать из файла</button>
                    </form>
                </div>
                @if (count($blogPosts) > 0)
                    {{ $blogPosts->links() }}
                    @foreach($blogPosts as $blogPost)
                        <div class="blog-container">
                            <h1 class="hero-header text-black">{{$blogPost->topic}}</h1>
                            <div class="blog-author">By {{$blogPost->author}}</div>
                            <div class="review-header">{{$blogPost->created_at}}</div>
                            @if (!is_null($blogPost->image))
                                <img src="{{ url("storage/".$blogPost->image) }}" alt="illustration" />
                            @else
                                <img src="{{ url("storage/blog/placeholder.png") }}" alt="placeholder"/>
                            @endif
                            <div class="blog-body">{{$blogPost->body}}</div>
                        </div>
                    @endforeach
                    {{ $blogPosts->links() }}
                @else
                    <div class="hero-secondary">Посты отсутствуют</div>
                @endif
            </div>
            <x-footer/>
        </div>
    </body>
</html>
