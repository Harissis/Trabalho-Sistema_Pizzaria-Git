<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Rotas para manipular usuários, porque todos precisamos de uns e outros :)
Route::post('/register', [UserController::class, 'store']);

Route::prefix('user')->group(function () {
    Route::get('list', [UserController::class, 'index']);    
    Route::put('update/{id}', [UserController::class, 'update']); 
    Route::delete('delete/{id}', [UserController::class, 'destroy']); 
    Route::get('view/{id}', [UserController::class, 'show']); 
});
