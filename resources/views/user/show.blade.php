@extends('layouts.main')

@section('title', 'User')

@section('content')
    <h1 class="heading">User</h1>

    <div class="px-32 py-8 flex flex-col gap-4">
        <h3 class="font-bold text-lg ml-4">{{ $user->email }}</h3>
        <h2 class="font-bold text-3xl ">{{ $user->name }}</h2>
        <p class="text-xl dark:text-dark-500">{{ $user->created_at }}</p>

        <p class="mt-4 font-bold text-lg">Published: </p>
        <div>
            @foreach ($user->publications as $publication)
                <li>
                    <a href="{{ route('publication.show', ['publication' => $publication]) }}">
                        {{ $publication->title }}
                    </a>
                </li>
            @endforeach
        </div>

    </div>
@endsection
