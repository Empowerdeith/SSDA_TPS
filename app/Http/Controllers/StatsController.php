<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Config;

class StatsController extends Controller
{
    public function show (){
        //Se genera la conexión con la cuenta de admin de base de datos
        $conn = oci_new_connect(config('oracle_conn_procedures.username'), config('oracle_conn_procedures.password'), config('oracle_conn_procedures.host/bd'),"AL32UTF8");

        $curs = oci_new_cursor($conn);
        $stid = oci_parse($conn, "begin SP_COUNT_EMP_RAFFLE_CURSOR(:cursbv); end;");
        oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
        oci_execute($stid);
        oci_execute($curs);
        $notes = array();
        while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            $notes[]=$row;
        }
        //Segundo procedimiento
        $cursUsers = oci_new_cursor($conn);

        $sql_users = 'BEGIN SP_COUNT_SORTEOS_ALL_USERS(:cursUsers); END;';
        $stmt_users = oci_parse($conn,$sql_users);
        // Aqui se hace BIND al output
        oci_bind_by_name($stmt_users,':cursUsers',$cursUsers,-1, OCI_B_CURSOR);

        oci_execute($stmt_users);

        oci_execute($cursUsers);
        $result_cur_users = array();
        while (($row2 = oci_fetch_array($cursUsers, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            $result_cur_users[]=$row2;
        }
        //se vacían los statements de oci
        oci_free_statement($stmt_users);
        oci_free_statement($cursUsers);
        oci_free_statement($stid);
        oci_free_statement($curs);
        oci_close($conn);

        return view('stats.stats')->with(['notes' => $notes,'result_cur_users'=> $result_cur_users]);
    }

 }
