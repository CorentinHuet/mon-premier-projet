@extends('layouts.base')

@section('title', 'Todo') 

@section('content')
    <form method="post" action="/addTodo">
        @csrf
        <input type="text" name="texte" placeholder="Votre texte">
        <button type="submit">Envoyer</button>
    </form>

    <table>
        @foreach($todos as $todo)
        <tr>
            <td>{{$todo->texte}}</td>
            @if($todo->termine == 0)
            <td><a href="/todo/terminer/{{ $todo->id}}">Terminer</a></td>
            @endif
            <td><a href="/todo/supprimer/{{ $todo->id}}">Supprimer</a></td>
        </tr>
        @endforeach
    </table>

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
@endsection