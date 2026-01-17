<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\IoTController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\UserController;

// Auth Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public Read Routes
Route::get('/reseps', [ResepController::class, 'index']);
Route::get('/reseps/{resep}', [ResepController::class, 'show']);
Route::get('/artikels', [ArtikelController::class, 'index']);
Route::get('/artikels/{artikel}', [ArtikelController::class, 'show']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Resep Management (Create, Update, Delete)
    Route::post('/reseps', [ResepController::class, 'store']);
    Route::put('/reseps/{resep}', [ResepController::class, 'update']);
    Route::delete('/reseps/{resep}', [ResepController::class, 'destroy']);
    
    // Resep Logic (HPP, AI, Bookmark)
    Route::get('/reseps/{id}/hpp', [ResepController::class, 'calculateHPP']);
    Route::post('/reseps/generate', [ResepController::class, 'generateIdeas']);
    Route::post('/reseps/{id}/bookmark', [ResepController::class, 'bookmark']);
    Route::delete('/reseps/{id}/bookmark', [ResepController::class, 'unbookmark']);

    // Plant Management (User Specific)
    Route::apiResource('plants', PlantController::class);

    // Artikel Management (Create, Update, Delete - usually Admin but using same auth for now)
    Route::post('/artikels', [ArtikelController::class, 'store']);
    Route::put('/artikels/{artikel}', [ArtikelController::class, 'update']);
    Route::delete('/artikels/{artikel}', [ArtikelController::class, 'destroy']);
    
    // Artikel Bookmark
    Route::post('/artikels/{id}/bookmark', [ArtikelController::class, 'bookmark']);
    Route::delete('/artikels/{id}/bookmark', [ArtikelController::class, 'unbookmark']);

    // IoT (Protected as per requirement logic, or at least View Protected)
    Route::get('/iots', [IoTController::class, 'index']);
    Route::get('/iots/latest', [IoTController::class, 'latest']);
    Route::post('/iots', [IoTController::class, 'store']);

    // Market Management
    Route::apiResource('markets', MarketController::class);

    // User Management (Admin/Self)
    Route::apiResource('users', UserController::class);

    // User Info
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
