@extends('layouts.base')

@section('title', 'Login') 

@section('content')
    <form method="post" action="/traitementLogin">
        @csrf
        <input type="mail" name="email" placeholder="Votre email">
        <input type="password" name="password" placeholder="Votre mot de passe">
        <button type="submit">Connexion</button>
    </form>

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
@endsection