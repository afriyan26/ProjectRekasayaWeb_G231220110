<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Authentication Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::post('/mahasiswa/create', [MahasiswaController::class, 'create']);
    Route::get('/mahasiswa/read', [MahasiswaController::class, 'read']);
    Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);

    Route::get('/dosen', [DosenController::class, 'index']);
    Route::post('/dosen/create', [DosenController::class, 'create']);
    Route::get('/dosen/read', [DosenController::class, 'read']);
    Route::put('/dosen/update/{id}', [DosenController::class, 'update']);
    Route::delete('/dosen/delete/{id}', [DosenController::class, 'delete']);

    Route::get('/makul', [MakulController::class, 'index']);
    Route::post('/makul/create', [MakulController::class, 'create']);
    Route::get('/makul/read', [MakulController::class, 'read']);
    Route::put('/makul/update/{id}', [MakulController::class, 'update']);
    Route::delete('/makul/delete/{id}', [MakulController::class, 'delete']);
});