@extends('layouts.main')

@section('title', 'Publications')

@section('content')
    <h1 class="heading">publications</h1>
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

        <div class="my-12 flex gap-4">
            <a href="{{ route('publication.edit', ['publication' => $publication]) }}">
                <button type="submit" class="w-20 text-white bg-blue-500 hover:bg-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-400">Edit</button>
            </a>

            <form action="{{ route('publication.destroy', ['publication' => $publication]) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="w-20 text-white bg-blue-500 hover:bg-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-400">Delete</button>
            </form>
        </div>

        <div>
            @foreach ($comments as $comment)
                <div class="p-4 my-4 bg-white border border-dark-500 rounded-lg shadow dark:bg-dark-100 dark:border-dark-200 ">
                    <div class="flex mb-4">
                        <i data-feather="user" class="h-10 w-auto border-2 rounded-lg mr-2"></i>
                        <div class="flex flex-col">
                            <p class="text-sm font-bold">{{ $comment->author->name }}</p>
                            <p class="text-sm dark:text-dark-500">{{ $comment->updated_at }}</p>
                        </div>
                        <i data-feather="more-horizontal" class="cursor-pointer ml-auto"></i>
                    </div>

                    <p class="text-md dark:text-dark-500">
                        {{ $comment->content }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
