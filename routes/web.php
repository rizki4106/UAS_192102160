<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth');

// 
Route::get('/dashboard/dosen', [DosenController::class, 'index'])->middleware('auth');
Route::get('/dashboard/dosen/create', [DosenController::class, 'create'])->middleware('auth');
Route::post('/dashboard/dosen/post', [DosenController::class, 'store'])->middleware('auth');
Route::delete('/dashboard/dosen/delete/{id}', [DosenController::class, 'destroy'])->middleware('auth');
Route::get("/dashboard/dosen/update/{id}", [DosenController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/dosen/edit/{id}', [DosenController::class,'update'])->middleware('auth');