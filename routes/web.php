<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('Login.Login');
});
Route::get('/inicio', function () {
    return view('Inicio.Inicio');
});
/*Route::post('/',function(){
    $credentials =  request()->only('email','password');
    Auth::attempt($credentials);
});*/
Route::get('/register', function () {
    return view('auth.register');
});

