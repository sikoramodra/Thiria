@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <h1 class="heading">Witaj na naszej jak na razie pustej stronie!</h1>
    <x-alerts></x-alerts>

    <div class="px-32 py-8 flex flex-col gap-4">
        <h3 class="font-bold text-lg ml-4">
            @if(isset($publication->author))
                {{ $publication->author->name }}
            @else
                [deleted]
            @endif
        </h3>
        <h2 class="font-bold text-3xl ">{{ $publication->title }}</h2>
        <p class="text-xl dark:text-dark-500">{{ $publication->content }}</p>
    </div>

    <p class="text-lg text-right mr-32">{{ $publication->created_at->diffForHumans() }}</p>
@endsection
