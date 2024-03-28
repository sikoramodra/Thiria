@extends('layouts.main')

@section('title', 'Home')

@section('content')
    @auth
    <form action="{{ route('user.logout') }}" method="post">
        @csrf
        <input type="submit" value="{{ Auth::user()->name }}" />
    </form>
    @else
    <a href="{{ route('user.view_login') }}">login</a>
    @endauth
@endsection
