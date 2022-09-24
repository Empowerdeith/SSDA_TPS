<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lista;
use App\Models\ListaRaffle;
use App\Models\Raffle;
use Session;

class ManualRaffleController extends Controller
{
    public function show(){
        return view('raffle.Manual_raffle');
    }
    public function GenerateManualRaffle(){
        $text_sorteos = request('texto_sorteados');
        if(!empty($text_sorteos)){
            $data_participantes = file_get_contents($text_sorteos);
        }
        else {
            $data_participantes = request('participantes');
        }
        $porcentaje_manual = request('porcentaje_manual');
        $resultados_all = array();
        $done_check=False;
        while(!$done_check){
            if (strpos($data_participantes,"\n")==False){
                $done_check=True;
            }
            else{
                $position = strpos($data_participantes,"\n");//posición del primer return
                $resultados_all[]=substr($data_participantes,0,$position);
                $data_participantes=substr($data_participantes,$position+1);
            }
        }
        if(strlen($data_participantes)>0){
            $resultados_all[]=$data_participantes;
        }
        $todo=count($resultados_all)*$porcentaje_manual/100;
        $resultados = array();
        for ($i=0; $i < $todo ; $i++) {
            $x= rand(0,count($resultados_all)-1);
            $resultados[]=$resultados_all[$x];
            array_splice($resultados_all, $x, 1);
        }
        Session::put('Lista_sorteados_m', $resultados);
        return view('raffle.Manual_raffle', compact('resultados','porcentaje_manual'));
    }
    public function Save_Manual_Raffle(){
        if(Session::has('Lista_sorteados_m')){
            $data_sorteados=Session::get('Lista_sorteados_m');
        }
        $Lista_usuario=Lista::create([
            'user_id' => auth()->user()->id,
        ]);
        foreach ($data_sorteados as $i => $row) {
            $pattern="/\;/";
            $row_data = preg_split ("/\;/", $row);
            $data_sorteos_bd=Raffle::create([
                'rut' => $row_data[0],
                'name'=> $row_data[1],
                'cargo' => $row_data[2],
            ]);
            $raffle=$data_sorteos_bd->id;
            $Lista_usuario->raffles()->attach($raffle);
        }
        return view('raffle.Manual_raffle');
    }
}
