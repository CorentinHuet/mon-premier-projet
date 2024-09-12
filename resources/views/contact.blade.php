@extends('layouts.base')

@section('title', 'Contact') 

@section('content')
    <form method="post" action="/sendMail">
        @csrf
        <input type="mail" name="mail" placeholder="Votre mail">
        <input type="text" name="titre" placeholder="Votre titre">
        <input type="text" name="texte" placeholder="Votre texte">
        <button type="submit">Envoyer</button>
    </form>

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
@endsection