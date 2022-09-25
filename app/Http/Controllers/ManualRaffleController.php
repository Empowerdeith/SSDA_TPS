<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
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
        $porcentaje_manual = request('porcentaje_manual'); //the percentage of randomness
        $resultados = array();
        try {
            $data_participantes=Excel::toArray(null, request()->file('texto_sorteados'))[0];// tomamos la primera página de excel

            $todo=count($data_participantes)*$porcentaje_manual/100;

            for ($i=0; $i < $todo ; $i++) {
                $x= rand(0,count($data_participantes)-1);
                $resultados[]=$data_participantes[$x];
                array_splice($data_participantes, $x, 1);
                //Log::info($value);
            }
            Session::put('Lista_sorteados_m', $resultados);

        } catch (\Throwable $th) {
        }
        return view('raffle.Manual_raffle', compact('resultados','porcentaje_manual'));
        //$data_participantes=Excel::toArray(null, request()->file('texto_sorteados'))[0];// tomamos la primera página de excel
    }


    public function Save_Manual_Raffle(){
        if(Session::has('Lista_sorteados_m')){
            $data_sorteados=Session::get('Lista_sorteados_m');
        }
        $Lista_usuario=Lista::create([
            'user_id' => auth()->user()->id,
        ]);
        foreach ($data_sorteados as $i => $row) {
            $data_sorteos_bd=Raffle::create([
                'rut' => $row[0],
                'name'=> $row[1],
                'cargo' => $row[2],
            ]);
            $raffle=$data_sorteos_bd->id;
            $Lista_usuario->raffles()->attach($raffle);
        }
        return view('raffle.Manual_raffle');
    }
}
