<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RaffleController extends Controller
{
    public function show(){
        return view('raffle.Auto_raffle');
    }
    public function generateRaffle(){
        $porcentaje = request('percentage');
        $resultados_table = array(
            array(16516543, "Armando", "TPS Supervisor"),
            array(16516544, "Mario", "TPS Esclavo"),
            array(16516545, "Ralf", "TPS Subejefe del Jefe"),
            array(16516546, "Yennefer", "TPS Waifu"),
            array(16516547, "Clifford", "TPS Jefe del Jefe"),
            array(16516547, "John Doe", "TPS big boss"),
            array(16516547, "Maximiliano", "TPS 2nd big boss"),
            array(16516547, "A Pedra", "TPS big boss"),
            array(16516547, "Joao", "TPS big boss"),
            array(16516547, "Mike", "TPS big boss"),
            array(16516547, "Josue", "TPS empleado"),
            array(16516547, "Dario", "TPS empleado limpieza"),
            array(16516547, "Nicolas", "TPS empleado piso 3"),
            array(16516547, "Antonio", "TPS esclavo 2"),
            array(16516547, "Valentina", "TPS esclava"),
            array(16516547, "Maria", "TPS secretaria"),
            array(16516547, "Antonia", "TPS ingeniera"),
            array(16516547, "Marta", "TPS Container"),
            array(16516547, "Pablo", "TPS Mercenario"),
            array(16516547, "Jacinto", "TPS Sala de maquinas")
            //sec//
        );
        $todo=count($resultados_table)*$porcentaje/100;
        $resultados = array();
        for ($i=0; $i < $todo ; $i++) {
            $x= rand(0,count($resultados_table)-1);
            $resultados[]=$resultados_table[$x];
            array_splice($resultados_table, $x, 1);
        }
        return view('raffle.Auto_raffle', compact('resultados','porcentaje'));
    }



}
