@extends('layouts.base')

@section('title', 'Todo')

@section('content')
<div class="w-full max-w-xs bg-white shadow-md rounded">
    <h1 class="text-lg font-bold dark:text-white">App Todo</h1>
    <form class="px-8 pt-6 pb-8 mb-4" method="post" action="/addTodo">
        @csrf
        <div class="grid gap-5 grid-cols-2">
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" name="texte" type="text" placeholder="Votre texte">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+</button>
        </div>
    </form>

    @if(count($todos) >= 1) 
        <div class="flex mb-4">
            <div class="w-60 h-12">
                @foreach($todos as $todo)
                <div class="max-w-sm overflow-hidden rounded-md">
                    <div class="grid gap-5 grid-cols-3 bg-gray-300 flex mb-3 px-4 py-1">
                        <div class="font-bold text-xl mb-2">{{$todo->texte}}</div>
                        @if($todo->termine == 0)
                        <a href="/todo/terminer/{{ $todo->id}}">
                            <button class="bg-gray-300 hover:bg-green-500 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M 19.980469 5.9902344 A 1.0001 1.0001 0 0 0 19.292969 6.2929688 L 9 16.585938 L 5.7070312 13.292969 A 1.0001 1.0001 0 1 0 4.2929688 14.707031 L 8.2929688 18.707031 A 1.0001 1.0001 0 0 0 9.7070312 18.707031 L 20.707031 7.7070312 A 1.0001 1.0001 0 0 0 19.980469 5.9902344 z"></path>
                                </svg>
                            </button>
                        </a>
                        @endif
                        <a href="/todo/supprimer/{{ $todo->id}}">
                            <button class="bg-gray-300 hover:bg-red-600 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="20px" height="20px">
                                    <path d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z" />
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
                @endforeach
                <p>Vous avez <?= count($todos) ?> tâches en attentes.</p>
            </div>
        </div>
    @endif
</div>

@if(session('error'))
<div style="color: red;">{{ session('error') }}</div>
@endif

@if(session('success'))
<div style="color: green;">{{ session('success') }}</div>
@endif
@endsection