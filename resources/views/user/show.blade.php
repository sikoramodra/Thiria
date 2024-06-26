@extends('layouts.main')

@section('title', '')

@section('content')


<div class="flex items-center flex-col bg-firstColor bg-opacity-50 backdrop-blur-md overflow-y-scroll" style="height: calc( 100vh - 6rem )">
    <h1 class="font-bold font-times text-8xl mt-8">{{$user->name}}</h1>
    <h2 class="font-bold font-times text-2xl">Member since {{$user->created_at->format('Y-m-d')}}</h2>

    @if (Auth::id()===$user->id)
        <div class="bg-firstColor shadow-md rounded px-8 pt-6 pb-8 mt-12">
            <form action="{{ route('user.update', ['user' => Auth::user()]) }}" method="post">
                @csrf
                @method('PUT')
                <h1 class="my-4">Change password</h1>
                <input type="password" name="current_password" placeholder="current password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"/>
                @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                <input type="password" name="new_password" placeholder="new password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"/>
                @error('new_password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                <input type="password" name="new_password_confirmation" placeholder="new password confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"/>
                </br>
                <input type="submit" value="Change" class="w-20 text-fifthColor bg-thirdColor hover:bg-secondColor font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-4"/>
            </form>

            <form action="{{ route('user.delete', ['user' => Auth::user()]) }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="mt-4 w-20 text-fifthColor bg-red-300 hover:bg-red-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center"/>
            </form>
        </div>
    @endif

    <div>
        <h2 class="font-bold font-times text-4xl ml-12 mt-20 mb-4">{{$user->name}}'s creatures:</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4 overflow-y-scroll shadow-2xl shadow-black" style="height: calc( 100vh - 24rem); scrollbar-width:initial; scrollbar-color: #6C584C transparent;">
            @foreach ($creatures as $creature)
                <a href="{{ route('creature.view_show', ['creature' => $creature]) }}" class="p-4 my-4 bg-secondColor/55 backdrop-blur-3xl border border-dark-500 rounded-lg shadow shadow-fifthColor">
                    <h5 class="mb-2 text-center text-3xl font-times font-bold text-dark-100">{{ $creature->name }}</h5>
                    <p class="text-dark-200 text-2xl break-all">{{ $creature->excerpt }}</p>
                    <p class="text-dark-200">{{ $creature->created_at }}</p>
                    
                    @if(isset($creature->user))
                        <p class="mt-2 mb-6">{{$creature->user->name}}</p>
                    @else
                        <p class="mt-2 mb-6">[deleted]</p>
                    @endif

                    <div class="flex flex-row gap-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z"></path>
                        </svg>
                        <span class="mr-4">{{$creature->votes->where('vote', 'upvote')->count()}}</span>

                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 15h2.25m8.024-9.75c.011.05.028.1.052.148.591 1.2.924 2.55.924 3.977a8.96 8.96 0 01-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398C20.613 14.547 19.833 15 19 15h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 00.303-.54m.023-8.25H16.48a4.5 4.5 0 01-1.423-.23l-3.114-1.04a4.5 4.5 0 00-1.423-.23H6.504c-.618 0-1.217.247-1.605.729A11.95 11.95 0 002.25 12c0 .434.023.863.068 1.285C2.427 14.306 3.346 15 4.372 15h3.126c.618 0 .991.724.725 1.282A7.471 7.471 0 007.5 19.5a2.25 2.25 0 002.25 2.25.75.75 0 00.75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 002.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384"></path>
                        </svg>
                        <span>{{$creature->votes->where('vote', 'downvote')->count()}}</span>
                    </div> 
                </a>
            @endforeach
        </div>
    </div>
</div>

@endsection
