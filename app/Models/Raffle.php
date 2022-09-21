<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    use HasFactory;
    public $table = "raffle";

    protected $primarykey = 'id';

    protected $fillable = ['id','rut', 'name', 'cargo'];

    public function rafflelista(){
        return $this->hasMany(ListaRaffle::class);
    } 
    

}
