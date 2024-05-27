@extends('layouts.main')

@section('title', '')

@section('content')
<div class="flex items-center justify-center" style="height: calc( 100vh - 6rem )">
    <div class="w-full max-w-md">
        <div class="bg-firstColor shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-center text-2xl font-bold mb-6 text-fifthColor">Login</h2>
            <form action="{{ route('user.login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label class="block text-fifthColor text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-fifthColor text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                    @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-thirdColor hover:bg-fourthColor text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Sign In
                    </button>
                    <a href="{{ route('user.register') }}" class="inline-block align-baseline font-bold text-sm text-thirdColor hover:text-fourthColor">
                        Register
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
