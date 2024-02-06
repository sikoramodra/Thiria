@props([
    'comment',
    'comments',
])


@if(!isset($comment->deleted_at))
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

        <button
            class="w-20 text-white bg-green-500 hover:bg-green-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-400"
            onclick="setRespond({{$comment->id}},'{{ $comment->author->name }}')">Respond
        </button>

        <form action="{{ route('comment.delete', ['comment' => $comment]) }}" method="post">
            @csrf
            @method('DELETE')
            <button
                class="w-20 text-white bg-red-500 hover:bg-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-400">
                Delete
            </button>
        </form>

        @foreach ($comments as $response)
            @if(isset($response->parent_id) && $response->parent_id == $comment->id)
                <x-comment :comment="$response" :comments="$comments"></x-comment>
            @endif
        @endforeach

    </div>
@else
    <div class="p-4 my-4 bg-white border border-dark-500 rounded-lg shadow dark:bg-dark-100 dark:border-dark-200 ">
        <p class="text-md dark:text-dark-500">
            [deleted]
        </p>
    </div>
@endif
