<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\RaffleController;
use App\Http\Controllers\ManualRaffleController;
use App\Http\Controllers\HistorialController;
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

Route::get('/updateUserView/{id}',[ManageUserController::class, 'updateUserView'])->name('updateUserView');
Route::post('/updateUser/{id}',[ManageUserController::class, 'updateUser'])->name('updateUser');

Route::post('/deleteUser/{id}',[ManageUserController::class, 'deleteUser'])->name('deleteUser');

//faq
Route::get('/faq',[ManageUserController::class, 'faq'])->name('faq');

//Sorteo automático
Route::get('/raffle_auto', [RaffleController::class, 'show']);
Route::post('/raffle_auto', [RaffleController::class, 'generateRaffle']);


//Sorteo Manual
Route::get('/raffle_manual', [ManualRaffleController::class, 'show']);
Route::post('/raffle_manual', [ManualRaffleController::class, 'GenerateManualRaffle']);

//historial sorteo - detalle
Route::get('/historial',[HistorialController::class, 'historial'])->name('historial');
Route::get('/historialdetalle/{id}',[HistorialController::class, 'historialdetalle'])->name('historialdetalle');

//exportar
Route::get('/export/{raffle_id}',[HistorialController::class, 'export'])->name('export');
