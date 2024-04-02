@extends('layouts.main')

@section('title', '')

@section('content')
<form action="{{ route('user.update', ['user' => Auth::user()]) }}" method="post">
    @csrf
    @method('PUT')

    <input type="password" name="current_password" placeholder="current password" />
    <input type="password" name="new_password" placeholder="new password" />
    <input type="password" name="new_password_confirmation" placeholder="new password confirmation" />
    <input type="submit" />
</form>

<form action="{{ route('user.delete', ['user' => Auth::user()]) }}" method="post">
    @csrf
    @method('DELETE')
    <input type="submit" />
</form>
@endsection
