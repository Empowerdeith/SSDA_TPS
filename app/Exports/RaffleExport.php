<?php

namespace App\Exports;

use App\Models\Raffle;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Contracts\Queue\ShouldQueue;

/*class RaffleExportView implements FromView
{

    public function view(): View
    {
        return view('historial.historialdetalle', [
            'query' => Raffle::all()
        ]);
    }
}*/

/*class RaffleExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;
    public function collection()
    {
      return Raffle::all();
    }

     public function map($row): array{
           $fields = [
              $row->raffle_id,
              $row->rut,
              $row->name,
              $row->cargo,
         ];
        return $fields;
    }

    public function headings(): array
        {
            return [
                'raffle_id',
                'rut',
                'name',
                'cargo',
            ];
    }
}*/


class RaffleExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct(int $raffle_id)
    {
        $this->raffle_id = $raffle_id;
    }

    public function query()
    {
        return Raffle::query()->where('raffle_id', $this->raffle_id);
    }

    public function headings(): array
        {
            return [
                'Numero',
                'ID',
                'ID Sorteo',
                'Rut',
                'Nombre',
                'Cargo',
                'Fecha Creacion',
            ];
    }
}