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
                @if(!isset($comment->deleted_at) && !isset($comment->parent_id))
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

                        <button class="w-20 text-white bg-green-500 hover:bg-green-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-400" onclick="setRespond({{$comment->id}},'{{ $comment->author->name }}')">Respond</button>

                        <form action="{{ route('comment.delete', ['comment' => $comment]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="w-20 text-white bg-red-500 hover:bg-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-400">Delete</button>
                        </form>
                        @foreach ($comments as $respond)
                            @if($respond->parent_id==$comment->id)
                                    <div class="my-4 p-4 rounded-lg ml-4 bg-white border border-dark-500 dark:bg-dark-100 dark:border-dark-200">
                                        <div class="flex mb-4">
                                            <i data-feather="user" class="h-10 w-auto border-2 rounded-lg mr-2"></i>
                                            <div class="flex flex-col">
                                                <p class="text-sm font-bold">{{ $comment->author->name }}</p>
                                                <p class="text-sm dark:text-dark-500">{{ $comment->updated_at }}</p>
                                            </div>
                                            <i data-feather="more-horizontal" class="cursor-pointer ml-auto"></i>
                                        </div>

                                        <p class="text-md dark:text-dark-500">
                                            {{ $respond->content }}
                                        </p>
                                    </div>
                            @endif
                        @endforeach

                    </div>
                @elseif (!isset($comment->parent_id))
                    <div class="p-4 my-4 bg-white border border-dark-500 rounded-lg shadow dark:bg-dark-100 dark:border-dark-200 ">
                        <p class="text-md dark:text-dark-500">
                            [deleted]
                        </p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
