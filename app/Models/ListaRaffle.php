<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaRaffle extends Model
{
    use HasFactory;
    public $table = "lista_raffle";

    public function raffleModels(){
        return $this->belongsTo(Raffle::class);
    }

    public function listaModels(){
        return $this->belongsTo(Lista::class);
    }
    
}
