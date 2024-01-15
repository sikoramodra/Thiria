@extends('layouts.main')

@section('title', 'User')

@section('content')
    <h1 class="heading">User</h1>

    <form action="{{ route('user.register') }}" method="post" class="m-24">
        @csrf

        <label for="name" class="block mb-2 text-sm font-medium mt-8">Username</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" class="border border-dark-400 text-dark-100 text-sm rounded-lg focus:border-blue-100 block w-full p-2.5 dark:bg-dark-200 dark:border-dark-400 dark:placeholder-dark-500 dark:text-white dark:focus:border-blue-100 outline-0" placeholder="Username">
        @error('name')
        <p class="text-red-100 text-xs italic">{{ $message }}</p>
        @enderror

        <label for="email" class="block mb-2 text-sm font-medium mt-8">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="border border-dark-400 text-dark-100 text-sm rounded-lg focus:border-blue-100 block w-full p-2.5 dark:bg-dark-200 dark:border-dark-400 dark:placeholder-dark-500 dark:text-white dark:focus:border-blue-100 outline-0" placeholder="Email">
        @error('email')
        <p class="text-red-100 text-xs italic">{{ $message }}</p>
        @enderror

        <label for="password" class="block mb-2 text-sm font-medium mt-8">Password</label>
        <input type="password" id="password" name="password" value="{{ old('password') }}" class="border border-dark-400 text-dark-100 text-sm rounded-lg focus:border-blue-100 block w-full p-2.5 dark:bg-dark-200 dark:border-dark-400 dark:placeholder-dark-500 dark:text-white dark:focus:border-blue-100 outline-0" placeholder="Password">
        @error('password')
        <p class="text-red-100 text-xs italic">{{ $message }}</p>
        @enderror

        <label for="password_confirmation" class="block mb-2 text-sm font-medium mt-8">Confirm password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="border border-dark-400 text-dark-100 text-sm rounded-lg focus:border-blue-100 block w-full p-2.5 dark:bg-dark-200 dark:border-dark-400 dark:placeholder-dark-500 dark:text-white dark:focus:border-blue-100 outline-0" placeholder="Confirm password">
        @error('password')
        <p class="text-red-100 text-xs italic">{{ $message }}</p>
        @enderror

        <button type="submit" class="mt-8 text-white bg-blue-500 hover:bg-blue-400 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-400">Submit</button>
    </form>

@endsection
