<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FerramentasController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('ferramentas', [FerramentasController::class, 'index']);    
Route::get('ferramentas/{tag}', [FerramentasController::class, 'show']);    
