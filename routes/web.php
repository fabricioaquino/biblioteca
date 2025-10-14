<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AssuntoController;

Route::get('/', function () {
    return view('home', ['title' => 'Início']);
});

Route::resource('livros', LivroController::class);
Route::resource('autores', AutorController::class);
Route::resource('assuntos', AssuntoController::class);
