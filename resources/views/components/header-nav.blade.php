@if((auth()->check() && auth()->user()->isAdmin()))
<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
    <li><a href="/" class="nav-link px-2 text-dark">Главная</a></li>
    <li><a href="/about" class="nav-link px-2 text-dark">О нас</a></li>
    <li><a href="/products" class="nav-link px-2 text-dark">Продукты</a></li>
    <li><a href="/news" class="nav-link px-2 text-dark">Новости</a></li>
    <li><a href="/moderation" class="nav-link px-2 text-dark">Модерация</a></li>
</ul>
@else
<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
    <li><a href="/" class="nav-link px-2 text-dark">Главная</a></li>
    <li><a href="/about" class="nav-link px-2 text-dark">О нас</a></li>
    <li><a href="/products" class="nav-link px-2 text-dark">Продукты</a></li>
    <li><a href="/news" class="nav-link px-2 text-dark">Новости</a></li>
</ul>
@endif