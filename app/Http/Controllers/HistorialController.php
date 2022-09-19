<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Raffle;
use Illuminate\Support\Facades\DB;
use App\Exports\RaffleExport;
use Maatwebsite\Excel\Concerns\FromView;
use Excel;



class HistorialController extends Controller
{
    public function historial(Request $request){
        $fromDate = $request->input('fromDate');
        $toDate   = $request->input('toDate');

        $query = DB::table('lista')->select()
            /*
            ->where('created_at', '>=', $fromDate)
            ->where('created_at', '<=', $toDate)
            ->get();
            */
            /*
            ->where([
                ['created_at', '>=', $fromDate],
                ['created_at', '<=', $toDate],
                ])->get();
            */
            ->whereBetween('created_at', [$fromDate, $toDate])->get();

        return view('historial.historial',compact('query'));
    }

    public function historialdetalle($id){

        $query = DB::table('raffle')
            ->select()
            ->join('lista_raffle', 'lista_raffle.raffle_id', '=','raffle.id')
            ->where('lista_raffle.lista_id', '=', $id)
            ->get();
        return view('historial.historialdetalle', compact('query'));
    }


    public function export($id) 
    {
        return (new RaffleExport($id))->download('DetalleSorteo.xlsx');
    }

}