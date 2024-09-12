<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoControleur;
use App\Http\Controllers\PingPongControleur;
use App\Http\Controllers\TestFlashController;


Route::get('/', function () {
    return view('welcome', ['titre' => 'Mon premier exemple.']);
});

Route::get('/ping', [PingPongControleur::class, 'ping']);
Route::get('/pong', [PingPongControleur::class, 'pong']);

Route::get('/flash', [TestFlashController::class, 'main']);
Route::post('/traitement', [TestFlashController::class, 'traitement']);

Route::get('/todo', [TodoControleur::class, 'listTodo']);
Route::post('/addTodo', [TodoControleur::class, 'addTodo']);
Route::get('/todo/terminer/{id}', [TodoControleur::class, 'markAsDone']);
Route::get('/todo/supprimer/{id}', [TodoControleur::class, 'deleteTodo']);