@extends('layouts.main')

@section('title', '')

@section('content')
<form action="{{ route('user.register') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="name" />
    <input type="email" name="email" placeholder="email" />
    <input type="password" name="password" placeholder="password" />
    <input type="password" name="password_confirmation" placeholder="password confirmation" />
    <input type="submit" />
</form>
@endsection
