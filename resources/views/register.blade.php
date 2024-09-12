@extends('layouts.base')

@section('title', 'Register') 

@section('content')
    <form method="post" action="/traitementRegister">
        @csrf
        <input type="text" name="name" placeholder="Votre nom">
        <input type="mail" name="email" placeholder="Votre email">
        <input type="password" name="password" placeholder="Votre mot de passe">
        <button type="submit">S'inscrire</button>
    </form>

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
@endsection