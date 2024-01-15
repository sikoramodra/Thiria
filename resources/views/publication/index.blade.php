@extends('layouts.main')

@section('title', 'Publications')

@section('content')
    <h1 class="heading">publications</h1>
    <x-alerts></x-alerts>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-2">
        @foreach ($publications as $publication)
            <x-publication :publication="$publication"></x-publication>
        @endforeach
    </div>
@endsection
