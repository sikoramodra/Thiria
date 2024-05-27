@extends('layouts.main')

@section('title', '')

@section('content')
<script>
    const setRespond = (a,b) => {
        let parent = document.getElementById('comment_id');
        let label = document.getElementById('comment_label');
        let cancel = document.getElementById('cancel_respond');
        let button = document.getElementById('submit_button');

        parent.value = a;
        label.textContent = 'Responding to ' + b;
        cancel.style.display = 'block';
        button.textContent = 'Respond';
    }
    const cancelRespond = () => {
        let parent = document.getElementById('comment_id');
        let label = document.getElementById('comment_label');
        let cancel = document.getElementById('cancel_respond');
        let button = document.getElementById('submit_button');

        parent.value = '';
        label.textContent = 'Comment';
        cancel.style.display = 'none';
        button.textContent = 'Comment';
    }
</script>
<div class="px-32 py-8 flex flex-col overflow-y-scroll bg-secondColor/55 backdrop-blur-3xl" style="height: calc( 100vh - 6rem ); scrollbar-width:initial; scrollbar-color: #6C584C transparent;">
    <h3 class="font-bold text-lg ml-4">
        @if(isset($creature->user))
            <a href="{{ route('user.view_show', ['user' => $creature->user]) }}">{{ $creature->user->name }}</a>
        @else
            [deleted]
        @endif
    </h3>
    <h3 class="font-bold text-3xl ">{{ $creature->name }}</h3>
    <h2 class="font-bold text-3xl">{{ $creature->description }}</h2>
    <p class="text-xl dark:text-dark-500">{{ $creature->statblock }}</p>

    

    @auth
        @if (Auth::id()==$creature->user->id)
            <div class="my-12 flex gap-4">
                <a href="{{ route('creature.edit', ['creature' => $creature]) }}">
                    <button type="submit" class="w-20 text-white bg-thirdColor hover:bg-secondColor font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                </a>
    
                <form action="{{ route('creature.delete', ['creature' => $creature]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="w-20 text-fifthColor bg-red-300 hover:bg-red-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Delete</button>
                </form>
            </div>     
        @endif    

    @endauth

    <div class="flex flex-row gap-2">

    <form action="{{ $vote_type !== 'upvote' ? route('vote.add') : route('vote.delete', ['vote'=>$uservote]) }}" method="post">
        @csrf
        @if ($vote_type === 'upvote')
            @method('DELETE')
        @endif

        <button type="submit" name="vote" value="upvote" class="py-1.5 px-3 hover:text-green-600 hover:scale-105 hover:shadow text-center border border-gray-300 rounded-md h-8 text-sm flex items-center gap-1 lg:gap-2 @if($vote_type === 'upvote') bg-green-200 @endif">
            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z"></path>
            </svg>
            <span>{{$upvotes}}</span>
        </button>
        <input type="hidden" name="user_id" value="{{0}}">
        <input type="hidden" name="creature_id" value="{{ $creature->id }}">
    </form>

    <form action="{{ $vote_type !== 'downvote' ? route('vote.add') : route('vote.delete', ['vote'=>$uservote]) }}" method="post">
        @csrf
        @if ($vote_type === 'downvote')
            @method('DELETE')
        @endif

        <button type="submit" name="vote" value="downvote" class="py-1.5 px-3 hover:text-red-600 hover:scale-105 hover:shadow text-center border border-gray-300 rounded-md h-8 text-sm flex items-center gap-1 lg:gap-2 @if($vote_type === 'downvote') bg-red-200 @endif">
            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 15h2.25m8.024-9.75c.011.05.028.1.052.148.591 1.2.924 2.55.924 3.977a8.96 8.96 0 01-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398C20.613 14.547 19.833 15 19 15h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 00.303-.54m.023-8.25H16.48a4.5 4.5 0 01-1.423-.23l-3.114-1.04a4.5 4.5 0 00-1.423-.23H6.504c-.618 0-1.217.247-1.605.729A11.95 11.95 0 002.25 12c0 .434.023.863.068 1.285C2.427 14.306 3.346 15 4.372 15h3.126c.618 0 .991.724.725 1.282A7.471 7.471 0 007.5 19.5a2.25 2.25 0 002.25 2.25.75.75 0 00.75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 002.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384"></path>
            </svg>
            <span>{{$downvotes}}</span>
        </button>
        <input type="hidden" name="user_id" value="{{0}}">
        <input type="hidden" name="creature_id" value="{{ $creature->id }}">
    </form>
    </div>

    <div>
        <form action="{{ route('comment.add') }}" method="post" class="flex flex-col gap-2">
            @csrf
            <h3 id="comment_label">Comment</h3>

            <input type="hidden" name="creature_id" value="{{ $creature->id }}">
            <input type="hidden" id="comment_id" name="comment_id" value="">
            <input type="hidden" name="user_id" value="{{0}}">
            <textarea id="text" name="text" rows="5" cols="50" class="bg-dark-200 rounded-xl p-2" placeholder="Write your thoughts here..."></textarea>
            <button type="submit" id="submit_button" class="w-24 text-white bg-blue-500 hover:bg-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-400">Comment</button>
        </form>
        <button id="cancel_respond" style="display: none;" class="w-24 text-white bg-blue-500 hover:bg-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-400 mt-2 flex justify-center" onclick="cancelRespond()">Cancel<i data-feather="x"></i></button>
    </div>
    
    

    <div class="overflow-y-scroll">
        @foreach ($comments as $comment)
            @if(!isset($comment->comment_id))
                <x-comment :comments="$comments" :comment="$comment"></x-comment>
            @endif
        @endforeach
    </div>
</div>
@endsection
