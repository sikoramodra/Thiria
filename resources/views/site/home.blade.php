@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <!--@auth
    <a href="{{ route('user.view_show', ['user' => Auth::user()]) }}">{{ Auth::user()->name }}</a>
    <form action="{{ route('user.logout') }}" method="post">
        @csrf
        <input type="submit" value="logout" />
    </form>
    @else
    <a href="{{ route('user.view_login') }}">login</a>
    @endauth-->

    <div class="flex justify-center" style="height: calc(100vh - 6rem);">
        <div class="text-firstColor mt-64 items-center justify-center">
            <p class="font-times font-bold text-9xl">Welcome to Thiria</p>
            <div class="flex justify-center">
                <p class="text-2xl w-auto uppercase font-extrabold font-times text-headerColor bg-thirdColor p-1 px-6 mt-3">Copyright 2024 Franciszek Woźniak & Wojciech Modro</p>
            </div>
        </div>
    </div>
    

@endsection
