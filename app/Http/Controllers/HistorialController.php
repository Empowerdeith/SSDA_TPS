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

        $query = DB::table('list_raffle')->select()
            /*
            ->where('date', '>=', $fromDate)
            ->where('date', '<=', $toDate)
            ->get();
            */
            /*
            ->where([
                ['date', '>=', $fromDate],
                ['date', '<=', $toDate],
                ])->get();
            */
            ->whereBetween('created_at', [$fromDate, $toDate])->get();

        return view('historial.historial',compact('query'));
    }

    public function historialdetalle($raffle_id){

        $query = DB::table('raffle')->select()
            ->where('raffle_id', '=', $raffle_id)
            ->get();
        return view('historial.historialdetalle', compact('query'));
    }


    public function export($raffle_id) 
    {
        return (new RaffleExport($raffle_id))->download('DetalleSorteo.xlsx');
    }

}