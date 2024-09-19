<?php

use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\CheckTodo;
use App\Http\Middleware\CheckContact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoControleur;
use App\Http\Controllers\ContactControleur;
use App\Http\Controllers\PingPongControleur;
use App\Http\Controllers\TestFlashController;
use App\Http\Controllers\AuthentificationControleur;


Route::get('/', function () {
    return view('welcome', ['titre' => 'Mon premier exemple.']);
});

Route::get('/ping', [PingPongControleur::class, 'ping']);
Route::get('/pong', [PingPongControleur::class, 'pong']);

Route::get('/flash', [TestFlashController::class, 'main']);
Route::post('/traitement', [TestFlashController::class, 'traitement']);

Route::middleware('throttle:50,1')->get('/todo', [TodoControleur::class, 'listTodo'])->middleware(CheckAuth::class);
Route::middleware('throttle:10,1')->get('/addTodo', [TodoControleur::class, 'addTodo'])->middleware([CheckAuth::class, CheckTodo::class]);
Route::get('/todo/terminer/{id}', [TodoControleur::class, 'markAsDone'])->middleware(CheckAuth::class);
Route::get('/todo/supprimer/{id}', [TodoControleur::class, 'deleteTodo'])->middleware(CheckAuth::class);

Route::get('/contact', [ContactControleur::class, 'contact'])->middleware(CheckAuth::class);
Route::post('/sendMail', [ContactControleur::class, 'sendMail'])->middleware([CheckAuth::class, CheckContact::class]);

Route::get('/login', [AuthentificationControleur::class, 'login']);
Route::post('/traitementLogin', [AuthentificationControleur::class, 'traitementLogin']);
Route::get('/register', [AuthentificationControleur::class, 'register']);
Route::post('/traitementRegister', [AuthentificationControleur::class, 'traitementRegister']);