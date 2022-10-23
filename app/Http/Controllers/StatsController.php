<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function show (){

        //$conn = oci_connect("username", "password", "database"); //cambiar credenciales
        
        DB::raw("
            CREATE TABLE empleados_sorteado(
            RUT VARCHAR2(255),
            NOMBRE VARCHAR2 (255),
            CANTIDAD NUMBER (10),
            CARGO VARCHAR2 (255)
        );");

        /*$create_table = oci_parse($conn, "
            CREATE TABLE EMPLEADOS_COUNT(
            RUT VARCHAR2(255),
            NOMBRE VARCHAR2 (255),
            COUNTER NUMBER (10),
            CARGO VARCHAR2 (255)
        );");

        $ex = oci_execute($create_table) or die(oci_error());
        oci_execute($ex);*/

        //procedure
        $procedureName = 'sp_emp_num_raff_v2';

        $result = DB::executeProcedure($procedureName);

        //dd($result);

        //Log::info($result);

        $notes = DB::table('empleados_sorteado')->get();
        //procedure

        //$drop_table = oci_parse($conn, "DROP TABLE EMPLEADOS_COUNT;");

          
        DB::raw("
            DROP TABLE empleados_sorteado;");

        /*$ex = oci_execute($drop_table) or die(oci_error());
        oci_execute($ex);*/

        //return view("estadistica.stats", ['notes' => $notes]);

        //return view('stats.stats')->with(['notes' => $notes]);

        Log::info($notes);

        return view('stats.stats')->with(['notes' => $notes]);

    }

    /*
    public function show _num(){

        $conn = oci_connect("username", "password", "database");

        $create_table = oci_parse($conn, "
            CREATE TABLE SORTEOS_EMPLEADO(
            NOMBRE VARCHAR2(255),
            COUNTER NUMBER (10)
        );");

        $ex = oci_execute($create_table) or die(oci_error());
        oci_execute($ex);

        $procedureName = 'sp_user_num_raff_v2';

        $result = DB::executeProcedure($procedureName);

        //dd($result);

        //Log::info($result);

        $notes2 = DB::table('SORTEOS_EMPLEADO')->get();

        $drop_table = oci_parse($conn, "DROP TABLE SORTEOS_EMPLEADO;");

        $ex = oci_execute($drop_table) or die(oci_error());
        oci_execute($ex);

        //return view("estadistica.stats", ['notes' => $notes]);

        //return view('stats.stats')->with(['notes' => $notes]);

        Log::info($notes2);

        return view('stats.stats')->with(['notes' => $notes2]);

    }*/

 }
