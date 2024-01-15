<!DOCTYPE html>
<html lang="pl" class="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <script src="https://unpkg.com/feather-icons"></script>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-white text-dark-100 dark:bg-dark-100 dark:text-white min-h-screen relative flex flex-col">
        <nav class="h-12 w-full text-dark-100 dark:text-white p-2 flex items-center justify-between border-solid border-dark-100 dark:border-white bg-white/75 dark:bg-dark-100/75 px-2 py-4 shadow backdrop-blur-md fixed top-0">
            <h3 class="font-nova text-4xl uppercase underline">pzaw</h3>
            <div class="flex gap-3">
                <x-nav route="site.home" icon="home" name="home"></x-nav>
                <x-nav route="site.about_us" icon="info" name="about us"></x-nav>
                <x-nav route="publication.index" icon="user" name="publications"></x-nav>
                <x-nav route="publication.form" icon="message-square" name="write"></x-nav>
            </div>
            @auth
                <a class="cursor-pointer text-2xl" href="{{ route('auth.logout') }}">
                    {{ Auth::user()->name }}
                </a>
            @else
                <a class="cursor-pointer text-2xl" href="{{ route('auth.form') }}">
                    login
                </a>
            @endauth
        </nav>
        <main class="flex-grow">
            @yield('content')
        </main>
        <footer class="py-4 w-full px-6 flex-shrink-0">
            <p class="text-lg font-bold">Wojciech Modro</p>
            <p class="text-sm">Copyright © 2024</p>
        </footer>
    </body>
    <script defer>feather.replace();</script>
</html>
