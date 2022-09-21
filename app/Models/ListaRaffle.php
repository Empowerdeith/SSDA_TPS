<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaRaffle extends Model
{
    use HasFactory;
    public $table = "lista_raffle";

    protected $fillable = ['raffle_id', 'lista_id'];

    public function raffleModels(){
        return $this->belongsTo(Raffle::class);
    }

    public function listaModels(){
        return $this->belongsTo(Lista::class);
    }
    
}
