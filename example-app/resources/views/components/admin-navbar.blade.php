<header>
    <div><a href="{{ url('/admin') }}" class="hero-header">Страница админа</a></div>
    <div class="small-items">
        <div class="nav-but-container">
            <a href="{{ url('/admin/guestbook') }}" class="hero-secondary-but" title="GuestBook">Гостевая Книга</a>
        </div>
        <div class="nav-but-container">
            <a href="{{ url('/admin/blog') }}" class="hero-secondary-but" title="Edit blog">Редактировать блог</a>
        </div>
        <div class="nav-but-container">
            <a href="{{ url('/admin/history') }}" class="hero-secondary-but" title="View history">Статистика посещений</a>
        </div>
        <div class="nav-but-container">
            <a href="{{ url("/logout") }}" class="hero-secondary-but" title="Logout">Выйти</a>
        </div>
    </div>
</header>
<div id="filler-top"></div>
