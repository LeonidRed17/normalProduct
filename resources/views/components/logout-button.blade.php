<form method="POST" action="{{ route('logout') }}">
        @csrf
        
        <button type="submit" href="/logout" class="btn btn-outline-primary me-2 text-dark btn_hover_off">Выйти</button>
    </form>