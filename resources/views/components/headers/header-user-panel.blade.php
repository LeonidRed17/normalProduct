<div class="text-end d-flex align-items-center">
    @auth
    @if(Route::is('dashboard'))
    <x-buttons.button>
        <x-slot name="route">/profile</x-slot>
        {{auth()->user()->name }} 
    </x-buttons.button>
    <x-buttons.logout-button></x-buttons.logout-button>
    @else
    <x-buttons.button>
        <x-slot name="route">/dashboard</x-slot>
        {{ auth()->user()->name }} 
    </x-buttons.button>
    <x-buttons.logout-button></x-buttons.logout-button>
    @endif
    @endauth
    @guest
    <x-buttons.button>
        <x-slot name="route">/login</x-slot>
        Войти
    </x-buttons.button>
    <x-buttons.button>
        <x-slot name="route">/register</x-slot>
        Регистрация
    </x-buttons.button>
    @endguest
</div>