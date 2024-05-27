@extends('layouts.main')

@php
    $action = route('creature.add');
    $name = old('name');
    $description = old('description');
    $user_id = auth()->user()->id;

    if (! empty($creature)) {
        $action = route('creature.edit', ['creature' => $creature]);
        $name = $creature->name;
        $description = $creature->description;
        $user_id = $creature->user_id;
    }
@endphp

@section('title', 'Edit')

@section('content')
<form action="{{ $action }}" method="post" class="m-24">
    @csrf

    <h3 class="text-xl font-bold">
        @if (! empty($creature))
            @method('PUT')
            Edit Creature
        @else
            Add Creature
        @endif
    </h3>


    <label for="name" class="block mb-2 text-sm font-medium mt-8">Name</label>
    <input type="text" id="name" name="name" value="{{ $name }}" class="border border-dark-400 text-dark-100 text-sm rounded-lg focus:border-blue-100 block w-full p-2.5 outline-0" placeholder="Name">
    @error('name')
        <p class="text-red-100 text-xs italic">{{ $message }}</p>
    @enderror

    <label for="description" class="block mb-2 text-sm font-medium mt-8">Description</label>
    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-dark-100 rounded-lg border border-dark-400 focus:border-blue-100 outline-0" placeholder="Add a description...">{{ $description }}</textarea>
    @error('description')
        <p class="text-red-100 text-xs italic">{{ $message }}</p>
    @enderror

    <input type="hidden" name="user_id" value="{{ $user_id }}">

    <button type="submit" class="mt-8 text-white bg-blue-500 hover:bg-blue-400 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-400">Submit</button>
</form>
@endsection