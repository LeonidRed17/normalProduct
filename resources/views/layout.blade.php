<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <header class="p-3 bg-light border-1 border-bottom border-primary">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0  text-decoration-none">
                    <svg class="bi me-2" fill="yellow" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-dark">Главная</a></li>
                    <li><a href="/about" class="nav-link px-2 text-dark">О нас</a></li>
                    <li><a href="/products" class="nav-link px-2 text-dark">Продукты</a></li>
                    <li><a href="/news" class="nav-link px-2 text-dark">Новости</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" name="product_search" class="form-control form-control-dark text-bg-light" placeholder="Поиск продукта" aria-label="Search">
                </form>

                <div class="text-end">
                    <a type="button" href="/login" class="btn btn-outline-primary me-2 text-dark btn_hover_off">Личный кабинет</a>
                    <a type="button" href="/register" class="btn btn-outline-primary me-2 text-dark btn_hover_off">Регистрация</a>
                </div>
            </div>
        </div>
    </header>
</body>
<div class="container">
    @yield('main_content')
</div>

</html>