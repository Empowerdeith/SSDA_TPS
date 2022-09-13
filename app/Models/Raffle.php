<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    use HasFactory;
    public $table = "raffle";

    protected $primarykey = 'id';

    protected $fillable = ['rut', 'name', 'cargo','date',];

    public function rafflelist(){
        return $this->belongsTo(ListRaffle::class);
    } 
    

}
