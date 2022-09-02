<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ManageUserController;
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
Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/', [IndexController::class, 'show']);

//gestion de usuario

Route::get('/showUsers',[ManageUserController::class, 'showUsers'])->name('showUsers');
Route::get('/updateUser/{id}',[ManageUserController::class, 'updateUser'])->name('updateUser');
Route::post('/updateUser2/{id}',[ManageUserController::class, 'updateUser2'])->name('updateUser2');
Route::post('/deleteUser/{id}',[ManageUserController::class, 'deleteUser'])->name('deleteUser');
