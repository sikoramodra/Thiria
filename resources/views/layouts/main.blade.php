<!DOCTYPE html>
<html lang="pl" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-forest bg-no-repeat bg-cover">
    <header class="text-3xl uppercase font-black font-times text-slate-900 bg-headerColor/60 backdrop-blur-sm p-2 items-center h-24 inset-x-0 top-0 flex flex-row gap-16">
        
        <a class="text-black-100 bg-yellow-500 p-5 rounded-br-3xl rounded-tl-3xl">Thiria</a>
        <a class="{{ request()->routeIs('site.view_home') ? 'text-fifthColor  bg-firstColor' : 'text-firstColor bg-fourthColor' }} p-5 rounded-br-3xl rounded-tl-3xl" href="{{ route('site.view_home') }}">Home</a>
        <a class="{{ request()->routeIs('site.view_about-us') ? 'text-fifthColor bg-firstColor' : 'text-firstColor bg-fourthColor' }} p-5 rounded-br-3xl rounded-tl-3xl" href="{{ route('site.view_about-us') }}">About us</a>
        <a class="{{ request()->routeIs('creature.view_list') ? 'text-fifthColor bg-firstColor' : 'text-firstColor bg-fourthColor' }} p-5 rounded-br-3xl rounded-tl-3xl" href="{{ route('creature.view_list') }}">Creatures</a>
        <a class="{{ request()->routeIs('creature.view_add') ? 'text-fifthColor bg-firstColor' : 'text-firstColor bg-fourthColor' }} p-5 rounded-br-3xl rounded-tl-3xl" href="{{ route('creature.view_add') }}">Create</a>

        @auth
	        <h1 class="text-black-100 bg-secondColor p-5 ml-auto rounded">
                <a href="{{ route('user.view_show', ['user' => Auth::user()]) }}">{{ Auth::user()->name }}</a>
            </h1>
            <form action="{{ route('user.logout') }}" method="POST">
                @csrf
                <input type="submit" class="mr-10 text-firstColor" value="Logout" />
            </form>
            @else            
            <a href="{{ route('user.view_login') }}" class="text-black-900 bg-firstColor p-5 ml-auto mr-10 {{ request()->routeIs('user.view_login') ? 'text-headerColor bg-secondColor' : 'text-headerColor bg-thirdColor' }} p-5 rounded-br-3xl rounded-tl-3xl">Login</a>
        @endauth
    </header>

    <div class="flex flex-1 h-full items-center justify-center">
        <div class="w-3/5 " style="height: calc( 100vh - 6rem )">
            @yield('content')
        </div>
    </div>
</html>