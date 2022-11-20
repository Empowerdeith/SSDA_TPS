<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Config;

class HomeController extends Controller
{
    //proceso para cambiar lo que se debe mostrar en la página.
    public function index(){
        //Se genera la conexión con la cuenta de admin de base de datos
        $conn = oci_new_connect(config('oracle_conn_procedures.username'), config('oracle_conn_procedures.password'), config('oracle_conn_procedures.host/bd'),"AL32UTF8");

        $sql = 'BEGIN SP_COUNT_SORTEOS_USER(:user_id, :cursor_raffle_count, :cursor_position); END;';
        $stmt = oci_parse($conn,$sql);
        $curs_raffle_count = oci_new_cursor($conn);
        $curs_position = oci_new_cursor($conn);
        $curs_time_raf = oci_new_cursor($conn);

        // Se asigna el ID del usuario
        $user_id = auth()->user()->id;

        // Aqui se hace BIND al input
        oci_bind_by_name($stmt,':user_id',$user_id,-1);
        // Aqui se hace BIND al output
        oci_bind_by_name($stmt,':cursor_raffle_count',$curs_raffle_count,-1, OCI_B_CURSOR);
        oci_bind_by_name($stmt,':cursor_position',$curs_position,-1, OCI_B_CURSOR);
        oci_execute($stmt);
        oci_execute($curs_raffle_count);  // Execute the REF CURSOR like a normal statement id
        oci_execute($curs_position);

        $raffle_count = array();
        while (($curs_row_raffle = oci_fetch_array($curs_raffle_count, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            $raffle_count[]=$curs_row_raffle;
        }
        Log::info($raffle_count);

        $position = array();
        while (($curs_row_position = oci_fetch_array($curs_position, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            $position[]=$curs_row_position;
        }

        Log::info($position);


        //if($raffle_count){

        $sql_time = 'BEGIN SP_LAST_TIME(:user_id, :curs_time_raf); END;';
        $stmt_time = oci_parse($conn,$sql_time);

        // Aqui se hace BIND al input
        oci_bind_by_name($stmt_time,':user_id',$user_id,-1);

        // Aqui se hace BIND al output
        oci_bind_by_name($stmt_time,':curs_time_raf',$curs_time_raf,-1, OCI_B_CURSOR);

        oci_execute($stmt_time);

        oci_execute($curs_time_raf);


        $time_raf = array();
        while (($curs_row_timeraff = oci_fetch_array($curs_time_raf, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            $time_raf[]=$curs_row_timeraff;
        }

        Log::info($time_raf);


        return view('home.index')->with(['raffle_count' => $raffle_count,'time_raf' => $time_raf,'position' => $position]);
    }
}
