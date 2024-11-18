<div class="text-end d-flex align-items-center">
    @auth
    @if(Route::is('dashboard'))
    <x-button>
        <x-slot name="route">/profile</x-slot>
        {{ auth()->user()->name }} 
    </x-button>
    <x-logout-button></x-logout-button>
    @else
    <x-button>
        <x-slot name="route">/dashboard</x-slot>
        {{ auth()->user()->name }} 
    </x-button>
    <x-logout-button></x-logout-button>
    @endif
    @endauth
    @guest
    <x-button>
        <x-slot name="route">/login</x-slot>
        Войти
    </x-button>
    <x-button>
        <x-slot name="route">/register</x-slot>
        Регистрация
    </x-button>
    @endguest
</div>