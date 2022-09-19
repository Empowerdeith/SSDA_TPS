<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{

    use HasFactory;
    public $table = "lista";

    protected $primarykey = 'id';

    public function listaraffle(){
        return $this->hasMany(ListaRaffle::class);
    } 
    
}