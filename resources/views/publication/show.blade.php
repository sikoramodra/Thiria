@extends('layouts.main')

@section('title', 'Publications')

@section('content')

    <script>
        const setRespond = (a,b) => {
            let parent = document.getElementById('parent_id');
            let label = document.getElementById('comment_label');
            let cancel = document.getElementById('cancel_respond');
            let button = document.getElementById('submit_button');

            parent.value = a;
            label.textContent = 'Responding to ' + b;
            cancel.style.display = 'block';
            button.textContent = 'Respond';
        }
        const cancelRespond = () => {
            let parent = document.getElementById('parent_id');
            let label = document.getElementById('comment_label');
            let cancel = document.getElementById('cancel_respond');
            let button = document.getElementById('submit_button');

            parent.value = '';
            label.textContent = 'Comment';
            cancel.style.display = 'none';
            button.textContent = 'Comment';
        }
    </script>

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

        @auth
            @if (Auth::id()==$publication->author->id)
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
            @endif    

        @endauth

        

        <div>
            <form action="{{ route('comment.add') }}" method="post" class="flex flex-col gap-2">
                @csrf
                <h3 id="comment_label">Comment</h3>

                <input type="hidden" name="publication_id" value="{{ $publication->id }}">
                <input type="hidden" id="parent_id" name="parent_id" value="">
                <textarea id="content" name="content" rows="5" cols="50" class="bg-dark-200 rounded-xl p-2" placeholder="Write your thoughts here..."></textarea>
                <button type="submit" id="submit_button" class="w-24 text-white bg-blue-500 hover:bg-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-400">Comment</button>
            </form>
            <button id="cancel_respond" style="display: none;" class="w-24 text-white bg-blue-500 hover:bg-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-400 mt-2 flex justify-center" onclick="cancelRespond()"><i data-feather="x"></i></button>
        </div>

        <div>
            @foreach ($comments as $comment)
                @if(!isset($comment->parent_id))
                    <x-comment :comment="$comment" :comments="$comments"></x-comment>
                @endif
            @endforeach
        </div>
    </div>
@endsection
