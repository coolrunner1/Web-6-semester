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
                    </div>
                    <div class="interests-dropdown-item">
                        <a href="{{ url('/interests#int2') }}" class="hero-secondary-but">Английский язык</a>
                    </div>
                    <div class="interests-dropdown-item">
                        <a href="{{ url('/interests#int3') }}" class="hero-secondary-but">Книги</a>
                    </div>
                    <div class="interests-dropdown-item">
                        <a href="{{ url('/interests#int4') }}" class="hero-secondary-but">Фильмы</a>
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
            <a href="{{ url('/guestbook') }}" class="hero-secondary-but" title="GuestBook">Гостевая Книга</a>
        </div>
        <div class="nav-but-container">
            <a href="{{ url('/test') }}" class="hero-secondary-but" title="Test">Тест</a>
        </div>
        <div class="nav-but-container">
            <a href="{{ url('/blog') }}" class="hero-secondary-but" title="Blog">Мой Блог</a>
        </div>
        <div class="nav-but-container">
            <a href="{{ url('/history') }}" class="hero-secondary-but" title="View history">История</a>
        </div>
        @guest
            <div class="nav-but-container">
                <a href="{{ url('/login') }}" class="hero-secondary-but" title="Login">Логин</a>
            </div>
        @endguest
        @auth
            <div class="nav-but-container">
                <a href="{{ url("/logout") }}" class="hero-secondary-but" title="Logout">Выйти</a>
            </div>
        @endauth
    </div>
</header>
<div id="filler-top"></div>
