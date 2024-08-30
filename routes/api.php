<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/cadastrar', [UserController::class, 'store']);

Route::prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    
    // Adicionando as rotas PUT e DELETE
    Route::put('/{id}', [UserController::class, 'update']); 
    Route::delete('/{id}', [UserController::class, 'destroy']); 
});
