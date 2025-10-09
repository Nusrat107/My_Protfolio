<?php

use App\Http\Controllers\frontendController;
use Illuminate\Support\Facades\Route;


Route::get('/', [frontendController::class, 'index']);
Route::get('/portfolio-details', [frontendController::class, 'portfolioDetails']);
Route::get('/service-details', [frontendController::class, 'serviceDetails']);
Route::get('/privacy', [frontendController::class, 'privacy']);
Route::get('/starter-page', [frontendController::class, 'starterPage']);
Route::get('/terms', [frontendController::class, 'terms']);
Route::get('/404', [frontendController::class, 'error']);