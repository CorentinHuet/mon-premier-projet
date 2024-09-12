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
            <td><a href="/todo/terminer/{{ $todo->id}}">Terminer</a></td>
            <td><a href="/todo/supprimer/{{ $todo->id}}">Supprimer</a></td>
        </tr>
        @endforeach
    </table>
@endsection