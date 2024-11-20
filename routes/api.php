<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FerramentasController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('ferramentas', [FerramentasController::class, 'index'])->name('index');    
Route::get('ferramentas/api/{tag}', [FerramentasController::class, 'show']);    
Route::post('ferramentas', [FerramentasController::class, 'store'])->name('store');