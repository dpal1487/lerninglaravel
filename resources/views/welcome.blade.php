<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
    @if (Route::has('login'))
        @auth
            @include('dashboard')
        @else
            @include('auth.login')
        @endauth
    @endif
</body>
</html>
