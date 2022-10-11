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
use App\Http\Controllers\MailController;
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

//Rutas que son accesibles por todo tipo de usuario
Route::get('/', [IndexController::class, 'show']);

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/faq',[ManageUserController::class, 'faq'])->name('faq');
//--------------------------------------------------


//Rutas de Admin
Route::group(['middleware' => ['role:Admin']], function () {
    //registrar usuario
    Route::get('/register', [RegisterController::class, 'show']);

    Route::post('/register', [RegisterController::class, 'register']);

    //gestión de usuario
    Route::get('/showUsers',[ManageUserController::class, 'showUsers'])->name('showUsers');

    Route::get('/updateUserView/{id}',[ManageUserController::class, 'updateUserView'])->name('updateUserView');
    Route::post('/updateUser/{id}',[ManageUserController::class, 'updateUser'])->name('updateUser');

    Route::post('/deleteUser/{id}',[ManageUserController::class, 'deleteUser'])->name('deleteUser');
    //logs para admin
    Route::get('/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
});

//Rutas para Admin y funcionario
Route::group(['middleware' => ['role:Admin|Funcionario']], function () {
    //hogar
    Route::get('/home', [HomeController::class, 'index']);
    //cerrar sesión de usuario
    Route::get('/logout', [LogoutController::class, 'logout']);

    //Sorteo automático
    Route::get('/raffle_auto', [RaffleController::class, 'show']);
    Route::post('/raffle_auto', [RaffleController::class, 'generateRaffle']);

    Route::get('/raffle_save', [RaffleController::class, 'SaveRaffle'])->name('raffle.save');

    //Sorteo Manual ->middleware('permission:Admin')
    Route::get('/raffle_manual', [ManualRaffleController::class, 'show'])->name('raffle_manual.show');
    Route::post('/raffle_manual', [ManualRaffleController::class, 'GenerateManualRaffle']);

    Route::get('/raffle_save_m', [ManualRaffleController::class, 'Save_Manual_Raffle'])->name('raffle_manual.save');

    //historial sorteo - detalle
    Route::get('/historial',[HistorialController::class, 'historial'])->name('historial');
    Route::get('/historialdetalle/{id}',[HistorialController::class, 'historialdetalle'])->name('historialdetalle');

    //exportar
    Route::get('/export/{id}',[HistorialController::class, 'export'])->name('export');


    //enviar-correo
    Route::post('/send-email', [ManualRaffleController::class, 'Save_Manual_Raffle'])->name('send.email');
});
