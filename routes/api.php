<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\BuildingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* rotas clientes */
Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::post('/user', [UserController::class, 'store']);
Route::delete('/user/{id}', [UserController::class, 'delete']);

/* rotas Predios */
Route::get('/buildings', [BuildingController::class, 'index']);
Route::get('/building/{id}', [BuildingController::class, 'show']);
Route::put('/building/{id}', [BuildingController::class, 'update']);
Route::post('/building', [BuildingController::class, 'store']);
Route::delete('/building/{id}', [BuildingController::class, 'delete']);

/* rotas salas */
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/room/{id}', [RoomController::class, 'show']);
Route::put('/room/{id}', [RoomController::class, 'update']);
Route::post('/room', [RoomController::class, 'store']);
Route::delete('/room/{id}', [RoomController::class, 'delete']);

/* rotas tipagem */
Route::get('/types', [TypeController::class, 'index']);
Route::get('/type/{id}', [TypeController::class, 'show']);
Route::put('/type/{id}', [TypeController::class, 'update']);
Route::post('/type', [TypeController::class, 'store']);
Route::delete('/type/{id}', [TypeController::class, 'delete']);

