<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RaffleController extends Controller
{
    public function show(){
        return view('raffle.Auto_raffle');
    }


    public function get_vacaciones(){
        $curl2 = curl_init();
        curl_setopt_array($curl2, array(
        CURLOPT_URL => 'http://54.165.126.143/api/vacaciones',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $vacaciones = curl_exec($curl2);
        curl_close($curl2);
        $vacaciones2 = json_decode($vacaciones, true);
        $vacaciones3 = array();
        foreach ($vacaciones2 as $i => $element) {
            $vacaciones3[$element["rut"]]=$element;
        }
        return $vacaciones3;
    }

    public function licenciapermiso(){
        $curl3 = curl_init();
        curl_setopt_array($curl3, array(
        CURLOPT_URL => 'http://54.165.126.143/api/licenciapermiso',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $licenciapermisos = curl_exec($curl3);
        curl_close($curl3);
        $licenciapermisos2 = json_decode($licenciapermisos, true);
        $licenciapermisos3 = array();
        foreach ($licenciapermisos2 as $i => $element) {
            $licenciapermisos3[$element["rut"]]=$element;
        }
        return $licenciapermisos3;
    }

    public function generateRaffle(){
        $porcentaje = request('percentage');

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://54.165.126.143/api/trabajador',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $resultados_table = json_decode($response, true);

        $datos_filtrados = array();
        $vacaciones_filtradas = $this->get_vacaciones();
        $licencia_permisos_filtrados = $this->licenciapermiso();

        foreach ($resultados_table as $i => $element) {
            $check_vacaciones = True;
            $check_date_vacaciones = True;
            $date_today=date("Y-m-d");
            try {
                $elementos_vacaciones=$vacaciones_filtradas[$element["empleadoRut"]];
                $date_inicio_vacacion= date($elementos_vacaciones["inicio"]);
                $date_termino_vacacion= date($elementos_vacaciones["termino"]);
                $date_estado_vacacion= $elementos_vacaciones["estado"];
                if($date_today<$date_inicio_vacacion||$date_today>$date_termino_vacacion){
                    $check_date_vacaciones=False;
                }
                else if($date_estado_vacacion!="Aprobada"){
                    $check_date_vacaciones=False;
                }
            } catch (\Throwable $th) {
                $check_vacaciones=False;
            }
            $check_license = True;
            $check_date_license = True;
            //Check licencia
            try {
                $elementos_licencia=$licencia_permisos_filtrados[$element["empleadoRut"]];
                $date_inicio_licencia= date($elementos_licencia["asistenciaFechaInicio"]);
                $date_termino_licencia= date($elementos_licencia["asistenciaFechaTermino"]);
                if($date_today<$date_inicio_licencia||$date_today>$date_termino_licencia){
                    $check_date_license=False;
                }
            } catch (\Throwable $th) {
                $check_license=False;
            }
            if($check_vacaciones==False||$check_date_vacaciones==False){
                if($check_license==False||$check_date_license==False){
                    if ($element["empleado"]=="SI") {
                        $datos_filtrados[] = array(
                            "empleadoRut"=>$element["empleadoRut"],
                            "nombreCompleto"=>$element["nombreCompleto"],
                            "TrabajoCargo"=>$element["TrabajoCargo"],
                            "TrabajoFamiliaCargo"=>$element["TrabajoFamiliaCargo"],
                            "departamento"=>$element["departamento"]
                        );
                    }
                }
            }
        }
        $todo=count($datos_filtrados)*$porcentaje/100;
        $resultados = array();
        for ($i=0; $i < $todo ; $i++) {
            $x= rand(0,count($datos_filtrados)-1);
            $resultados[]=$datos_filtrados[$x];
            array_splice($datos_filtrados, $x, 1);
        }
        return view('raffle.Auto_raffle', compact('resultados','porcentaje'));
    }



}
