<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //proceso para cambiar lo que se debe mostrar en la página.
    public function index(){
        //Se genera la conexión con la cuenta de admin de base de datos
        $conn = oci_new_connect(env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_HOST').'/'.env('DB_DATABASE'),"AL32UTF8");

        $sql = 'BEGIN SP_COUNT_SORTEOS_USER(:user_id, :raffle_count); END;';
        $stmt = oci_parse($conn,$sql);

        // Aqui se hace BIND al input
        oci_bind_by_name($stmt,':user_id',$user_id,-1);

        // Aqui se hace BIND al output
        oci_bind_by_name($stmt,':raffle_count',$raffle_count,-1);

        // Se asigna el ID del usuario
        $user_id = auth()->user()->id;

        oci_execute($stmt);

        //Log::info($raffle_count);

        return view('home.index')->with(['raffle_count' => $raffle_count]);
    }
}
