@extends('layouts.main')

@php
    $action = route('publication.add');
    $title = old('title');
    $content = old('content');
    $author_id = old('author_id');

    if (! empty($publication)) {
        $action = route('publication.update', ['publication' => $publication]);
        $title = $publication->title;
        $content = $publication->content;
        $author_id = $publication->author_id;
    }
@endphp


@section('title', 'Form')

@section('content')
    <h1 class="heading">Form</h1>

    <form action="{{ $action }}" method="post" class="m-24">
        @csrf

        <h3 class="text-xl font-bold">
            @if (! empty($publication))
                @method('PUT')
                Edit Publication
            @else
                Add Publication
            @endif
        </h3>


        <label for="title" class="block mb-2 text-sm font-medium mt-8">Title</label>
        <input type="text" id="title" name="title" value="{{ $title }}" class="border border-dark-400 text-dark-100 text-sm rounded-lg focus:border-blue-100 block w-full p-2.5 dark:bg-dark-200 dark:border-dark-400 dark:placeholder-dark-500 dark:text-white dark:focus:border-blue-100 outline-0" placeholder="Title">
        @error('title')
            <p class="text-red-100 text-xs italic">{{ $message }}</p>
        @enderror

        <label for="content" class="block mb-2 text-sm font-medium mt-8">Content</label>
        <textarea id="content" name="content" rows="4" class="block p-2.5 w-full text-sm text-dark-100 rounded-lg border border-dark-400 focus:border-blue-100 dark:focus:border-blue-100 dark:bg-dark-200 dark:border-dark-400 dark:placeholder-dark-500 dark:text-white outline-0" placeholder="Create a publication...">{{ $content }}</textarea>
        @error('content')
            <p class="text-red-100 text-xs italic">{{ $message }}</p>
        @enderror

        <label for="author" class="block mb-2 text-sm font-medium mt-8">Author</label>
        <select id="author" name="author_id" class="border border-dark-400 text-dark-100 text-sm rounded-lg focus:border-blue-100 block w-full p-2.5 dark:bg-dark-200 dark:border-dark-400 dark:placeholder-dark-500 dark:text-white dark:focus:border-blue-100 outline-0">
            <option value="">--Wybierz autora--</option>
            @foreach($authors as $author)
                @if(!isset($author->deleted_at))
                    <option value="{{ $author->id }}" @selected($author_id == $author->id)>{{ $author->name }}</option>
                @endif
            @endforeach
        </select>
        @error('author_id')
            <p class="text-red-100 text-xs italic">{{ $message }}</p>
        @enderror

        <button type="submit" class="mt-8 text-white bg-blue-500 hover:bg-blue-400 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-400">Submit</button>
    </form>
@endsection
