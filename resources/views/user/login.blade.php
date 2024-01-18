@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <h1 class="heading">Login</h1>
    <x-alerts></x-alerts>

    <form action="{{ route('auth.login') }}" method="post" class="m-24">
        @csrf

        <label for="email" class="block mb-2 text-sm font-medium mt-8">Email</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" class="border border-dark-400 text-dark-100 text-sm rounded-lg focus:border-blue-100 block w-full p-2.5 dark:bg-dark-200 dark:border-dark-400 dark:placeholder-dark-500 dark:text-white dark:focus:border-blue-100 outline-0" placeholder="E-mail">
        @error('email')
        <p class="text-red-100 text-xs italic">{{ $message }}</p>
        @enderror

        <label for="password" class="block mb-2 text-sm font-medium mt-8">Password</label>
        <input type="password" id="password" name="password" value="{{ old('password') }}" class="border border-dark-400 text-dark-100 text-sm rounded-lg focus:border-blue-100 block w-full p-2.5 dark:bg-dark-200 dark:border-dark-400 dark:placeholder-dark-500 dark:text-white dark:focus:border-blue-100 outline-0" placeholder="Password">
        @error('password')
        <p class="text-red-100 text-xs italic">{{ $message }}</p>
        @enderror

        <div class="flex mb-2 mt-8">
            <input type="checkbox" id="remember_me" name="remember_me" class="border border-dark-400 text-dark-100 text-sm rounded-lg focus:border-blue-100 block p-2.5 dark:bg-dark-200 dark:border-dark-400 dark:placeholder-dark-500 dark:text-white dark:focus:border-blue-100 outline-0">
            <label for="remember_me" class="text-sm font-medium ml-2">Remember me</label>
        </div>
        @error('remember_me')
        <p class="text-red-100 text-xs italic">{{ $message }}</p>
        @enderror


        <button type="submit" class="mt-8 text-white bg-blue-500 hover:bg-blue-400 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-400">Submit</button>
    </form>

    <a href="{{ route('user.form') }}" class="ml-24 italic">*register</a>
@endsection
