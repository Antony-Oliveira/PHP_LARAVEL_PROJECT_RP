<?php

use App\Http\Controllers\RpController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Rotas de usuários

Route::get('/', [RpController::class, 'index']);
Route::get('/item/{id}', [RpController::class, 'itemShow']);
Route::post('/item', [RpController::class, 'sale'])->middleware('auth');
Route::get('/dashboard', [RpController::class, 'dashboard'])->middleware('auth');


//Rotas de administrador

Route::get('/admin', [RpController::class, 'adminInfo'])->middleware('auth');
Route::get('/admin/addItem', [RpController::class, 'add'])->middleware('auth');
Route::post('/admin/add', [RpController::class, 'addItem'])->middleware('auth');
Route::post('/admin/approve/{id}', [RpController::class, 'approve'])->middleware('auth');

