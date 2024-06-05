@props([
    'comments',
    'comment',
])


<div class="p-4 my-4 bg-firstColor border border-dark-500 rounded-lg shadow shadow-fifthColor">
@if(!isset($comment->deleted_at))
    <div class="flex mb-4">
        <i data-feather="user" class="h-10 w-auto border-2 rounded-lg mr-2"></i>
        <div class="flex flex-col">
            @if (isset($comment->user->name))
                <p class="text-sm font-bold">{{ $comment->user->name }}</p>
            @else
                <p class="text-sm font-bold">[deleted]</p>
            @endif
            
            <p class="text-sm dark:text-dark-500">{{ $comment->updated_at }}</p>
        </div>
        <i data-feather="more-horizontal" class="cursor-pointer ml-auto"></i>
    </div>

    <p class="text-md dark:text-dark-500">
        {{ $comment->text }}
    </p>

    <div class="my-4 flex gap-4">
        <button
            class="w-20 text-fifthColor bg-thirdColor hover:bg-secondColor font-medium rounded-lg text-sm py-2.5 text-center"
            onclick="setRespond({{$comment->id}},'@if(isset($comment->user->name)) {{ $comment->user->name }} @endif')">Respond
        </button>

        @if (isset($comment->user->id) && Auth::id()==$comment->user->id)
            <form action="{{ route('comment.delete', ['comment' => $comment]) }}" method="post">
                @csrf
                @method('DELETE')
                <button
                    class="w-20 text-fifthColor bg-red-300 hover:bg-red-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Delete
                </button>
            </form>
        @endif
    </div>

@else
    <p class="text-md dark:text-dark-500">
        [deleted]
    </p>
@endif
    @foreach ($comments as $response)
        @if(isset($response->comment_id) && $response->comment_id == $comment->id)
            <x-comment :comment="$response" :comments="$comments"></x-comment>
        @endif
    @endforeach
</div>
