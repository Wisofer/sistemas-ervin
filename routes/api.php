<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrutaController;
use App\Http\Controllers\ClienteController;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('user', [AuthController::class, 'user']);
Route::get('frutas', [FrutaController::class, 'getFrutas']);


Route::get('clientes', [ClienteController::class, 'index']);
Route::post('clientes', [ClienteController::class, 'store']);
Route::get('clientes/{id}', [ClienteController::class, 'show']);
Route::put('clientes/{id}', [ClienteController::class, 'update']);
Route::delete('clientes/{id}', [ClienteController::class, 'destroy']);
