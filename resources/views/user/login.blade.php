@extends('layouts.main')

@section('title', '')

@section('content')
    <form action="{{ route('user.login') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name" />
        <input type="password" name="password" placeholder="password" />
        <input type="submit" />
    </form>
@endsection
