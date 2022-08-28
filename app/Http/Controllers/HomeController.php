<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //proceso para cambiar lo que se debe mostrar en la página.
    public function index(){
        return view('home.index');
    }
}
