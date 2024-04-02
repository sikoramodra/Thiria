@extends('layouts.main')

@section('title', 'Home')

@section('content')
    @auth
    <a href="{{ route('user.view_show', ['user' => Auth::user()]) }}">{{ Auth::user()->name }}</a>
    <form action="{{ route('user.logout') }}" method="post">
        @csrf
        <input type="submit" value="logout" />
    </form>
    @else
    <a href="{{ route('user.view_login') }}">login</a>
    @endauth
@endsection
