<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaRaffle extends Model
{
    use HasFactory;
    public $table = "lista_raffle";
    protected $primarykey = 'id';
    protected $fillable = ['raffle_id', 'lista_id'];
}
