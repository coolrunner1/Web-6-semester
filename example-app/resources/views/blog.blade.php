<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">

        <x-title/>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        @vite('resources/js/jquery-3.7.1.min.js')
        @vite('resources/js/script.js')
        @vite('resources/js/timer.js')
        @vite('resources/js/comment.js')

    </head>
    <body>
        <x-navbar/>
        <div class="guestbook-content-container">
            <div class="information">Записи блога</div>
            <div class="blogs-container">
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
                            <h3 class="hero-header text-black">Комментарии</h3>
                            @auth
                                <button id="but-post-{{$blogPost->id}}" class="add-comment-btn">Добавить комментарий</button>
                            @endauth
                            <div id="post-comments-{{$blogPost->id}}" class="comments-container">
                                @if(count($blogPost->comments))
                                    @foreach($blogPost->comments as $comment)
                                        <div class="blog-container">
                                            <div class="blog-author">{{$comment->author}} написал:</div>
                                            <div class="review-header">{{$comment->created_at}}</div>
                                            <div class="blog-body">{{$comment->body}}</div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="hero-secondary text-black">Комментарии отсутствуют</div>
                                @endif
                            </div>
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
