<?php
// app/Http/Middleware/IsAdmin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Проверка, является ли пользователь администратором.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Проверяем, что пользователь аутентифицирован и является администратором
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        // Если пользователь не администратор, перенаправляем его, например, на главную
        return redirect('/');
    }
}