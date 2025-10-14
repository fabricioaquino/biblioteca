<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AutorController;
use App\Http\Controllers\Api\LivroController;
use App\Http\Controllers\Api\AssuntoController;

// teste para API
Route::get('/', function () {
    return response()->json(['message' => 'API Biblioteca funcionando!']);
});

Route::apiResource('livros', LivroController::class)->names([
    'index'     => 'api.livros.index',
    'store'     => 'api.livros.store',
    'show'      => 'api.livros.show',
    'update'    => 'api.livros.update',
    'destroy'   => 'api.livros.destroy',
]);

Route::apiResource('autores', AutorController::class)->names([
    'index'     => 'api.autores.index',
    'store'     => 'api.autores.store',
    'show'      => 'api.autores.show',
    'update'    => 'api.autores.update',
    'destroy'   => 'api.autores.destroy',
]);

Route::apiResource('assuntos', AssuntoController::class)->names([
    'index'     => 'api.assuntos.index',
    'store'     => 'api.assuntos.store',
    'show'      => 'api.assuntos.show',
    'update'    => 'api.assuntos.update',
    'destroy'   => 'api.assuntos.destroy',
]);
