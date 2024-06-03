@extends('layouts.main')

@section('title', '')

@section('content')
<div class="flex items-center justify-center" style="height: calc( 100vh - 6rem )">
    <div class="w-full max-w-md">
        <div class="bg-firstColor/90 backdrop-blur-2xl shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-center text-2xl font-bold mb-6 text-fifthColor">Register</h2>
            <form action="{{ route('user.register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label class="block text-fifthColor text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-fifthColor text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}"
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
                <div class="mb-6">
                    <label class="block text-fifthColor text-sm font-bold mb-2" for="password_confirmation">
                        Password Confirmation
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-thirdColor hover:bg-fourthColor text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Register
                    </button>
                    <a href="{{ route('user.login') }}" class="inline-block align-baseline font-bold text-sm text-fifthColor hover:text-fourthColor">
                        Already have an account? Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
