<header class="p-3 bg-light border-1 border-bottom border-primary">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0  text-decoration-none">
                <svg class="bi me-2" fill="yellow" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <x-header-nav></x-header-nav>
            <form action="{{ route('search') }}" method="GET" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 d-flex" role="search">
                <input type="text" name="query" value="{{ request('query') }}" class="form-control form-control-dark text-bg-light" placeholder="Поиск продукта" aria-label="Search">
                <button type="submit" class="btn btn-primary ms-2">Искать</button>
            </form>

            <x-header-user-panel>

            </x-header-user-panel>

        </div>
    </div>
</header>