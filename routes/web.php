<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\ProtfolioController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\frontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [frontendController::class, 'index']);
Route::get('/portfolio-details', [frontendController::class, 'portfolioDetails']);
Route::get('/service-details', [frontendController::class, 'serviceDetails']);
Route::get('/privacy', [frontendController::class, 'privacy']);
Route::get('/starter-page', [frontendController::class, 'starterPage']);
Route::get('/terms', [frontendController::class, 'terms']);
Route::get('/404', [frontendController::class, 'error']);


///AdminAuth.........
Route::get('/admin/login', [AdminAuthController::class, 'loginForm']);

Auth::routes();
Route::get('/admin/dashboard', [AdminController::class, 'adminDashbord']);

//About......
 Route::get('/about', [AboutController::class, 'about']);
    Route::post('/about/update', [AboutController::class, 'update']);

    Route::post('/skill/store', [AboutController::class, 'storeSkill']);
    Route::post('/skill/update/{id}', [AboutController::class, 'updateSkill']);
    Route::get('/skill/delete/{id}', [AboutController::class, 'deleteSkill']);


//Protfolio....
    Route::get('/admin/protfolio', [ProtfolioController::class, 'protfolio']);
Route::post('/protfolio/store', [ProtfolioController::class, 'store']);
Route::get('/protfolio/edit/{id}', [ProtfolioController::class, 'edit']);
Route::post('/protfolio/update/{id}', [ProtfolioController::class, 'update']);
Route::get('/protfolio/delete/{id}', [ProtfolioController::class, 'destroy']);

//Service......
    Route::get('/admin/service', [ServiceController::class, 'service']);
    Route::post('/service/store', [ServiceController::class, 'store']);
Route::post('/service/update/{id}', [ServiceController::class, 'update']);
Route::get('/service/delete/{id}', [ServiceController::class, 'delete']);


  